<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLoanRequest;
use App\Loan;
use Paystack;
use App\LoanAmount;
use App\LoanRepayment;
use App\Notifications\LoanApprovedNotification;
use App\Notifications\LoanDeclinedNotification;
use App\Notifications\LoanDisburedNotification;
use App\Notifications\LoanFlagNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:staff']);
    }

    public function index()
    {
        $loans = Loan::whereIn('status', ['Disbursed', 'Partially Paid', 'Fully Paid'])->get();

        return view('admin.loans.index', compact('loans'));
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $user = User::where('id', $loan->user_id)->first();

        
        if ($user->payment_method === "Paystack") {
            
            $data = Paystack::createPlan();
            User::where('email', $request->email)->update([
                'plan_code'     => $data['data']['plan_code'],
            ]);
        }
        
        $request['approved_at']     = now();
        $request['approved_by_id']  = auth()->id();
        
        $loan->update($request->all());
        
        // dd($request);
        
        $mailData = [
            'first_name' => $user->first_name,
            'loan_amount' => $loan->loan_amount,
        ];

        // $r = Notification::send($user, new LoanApprovedNotification($mailData));

        return back();
    }

    public function disburse(Request $request)
    {
        $loan = Loan::find($request->id);
                
        $user = User::where('id', $loan->user_id)->first();
        
        if ($user->payment_method === "Paystack") {
            $data = Paystack::createSubscription();
        }

        Loan::where('id', $loan->id)->update([
            'status'            => 'Disbursed',
            'disbursed_at'      => now(),
            'disbursed_by_id'   => auth()->id(),
        ]);

        $loan_amount = LoanAmount::create([
            'total'                  => $loan->total,
            'loan_id'                => $loan->id,
            'user_id'                => $loan->user_id,
            'repayment_option'       => $loan->repayment_option,
            'interest'               => $loan->interest,
            'loan_tenor'             => $loan->loan_duration,
            'loan_amount'            => $loan->loan_amount,
            'balance'                => $loan->total,
            'status'                 => 'Not Paid',
            'disbursed_date'         => $loan->updated_at,
            'due_date'               => Carbon::now()->addMonths($loan->loan_duration)->format('Y-m-d'),
        ]);

        // dd($loan_amount);
        
        // Interest and Principal payable monthly
        if ($loan_amount->repayment_option == 'Interest and Principal payable monthly') {
            for ($i=1; $i <= $loan_amount->loan_tenor; $i++) {          
                LoanRepayment::create([
                    'tenor'             => $i,
                    'amount'            => round($loan_amount->total / $loan_amount->loan_tenor, 2),
                    'status'            => 'Pending',
                    'loan_id'           => $loan_amount->loan_id,
                    'user_id'           => $loan_amount->user_id,
                    'due_date'          => Carbon::parse($loan_amount->updated_at)->addMonths($i)->format('Y-m-d'),
                    'loan_amount_id'    => $loan_amount->id,
                ]);
            }
        }
        // Interest and Principal payable at maturity 
        elseif ($loan_amount->repayment_option == 'Interest and Principal payable at maturity') { 
            LoanRepayment::create([
                'tenor'             => $loan_amount->loan_tenor,
                'amount'            => round($loan_amount->total, 2),
                'status'            => 'Pending',
                'loan_id'           => $loan_amount->loan_id,
                'user_id'           => $loan_amount->user_id,
                'due_date'          => Carbon::parse($loan_amount->updated_at)->addMonths($loan_amount->loan_tenor)->format('Y-m-d'),
                'loan_amount_id'    => $loan_amount->id,
            ]);
        }
        // Interest payable monthly and Principal at maturity 
        elseif ($loan_amount->repayment_option == 'Interest payable monthly and Principal at maturity') {
            for ($i=1; $i <= $loan_amount->loan_tenor; $i++) {
                if ($i == $loan_amount->loan_tenor) {
                    LoanRepayment::create([
                        'tenor'             => $i,
                        'amount'            => round(($loan_amount->interest / $loan_amount->loan_tenor) + $loan_amount->loan_amount, 2),
                        'status'            => 'Pending',
                        'loan_id'           => $loan_amount->loan_id,
                        'user_id'           => $loan_amount->user_id,
                        'due_date'          => Carbon::parse($loan_amount->updated_at)->addMonths($i)->format('Y-m-d'),
                        'loan_amount_id'    => $loan_amount->id,
                    ]);
                } else {
                    LoanRepayment::create([
                        'tenor'             => $i,
                        'amount'            => round($loan_amount->interest / $loan_amount->loan_tenor, 2),
                        'status'            => 'Pending',
                        'loan_id'           => $loan_amount->loan_id,
                        'user_id'           => $loan_amount->user_id,
                        'due_date'          => Carbon::parse($loan_amount->updated_at)->addMonths($i)->format('Y-m-d'),
                        'loan_amount_id'    => $loan_amount->id,
                    ]);
                }
                          
            }            
        }

        $user = User::where('id', $loan->user_id)->first();
        
        $mailData = [
            'first_name' => $user->first_name,
            'loan_amount' => $loan->loan_amount,
        ];

        // Notification::send($user, new LoanDisburedNotification($mailData));

        return back();
    }

    public function decline(UpdateLoanRequest $request, Loan $loan)
    {        
        Loan::where('id', $request->id)->update([
            'status'         => $request->status,
            'decline_reason' => $request->decline_reason
        ]);

        $loan = Loan::find($request->id);

        $user = User::where('id', $loan->user_id)->first();
        
        $mailData = [
            'first_name' => $user->first_name,
            'loan_amount' => $loan->loan_amount,
            'decline_reason' => $request->decline_reason,
        ];

        // Notification::send($user, new LoanDeclinedNotification($mailData));

        return back();
    }

    public function flag(UpdateLoanRequest $request, LoanRepayment $loan)
    {   

        $loan = LoanRepayment::find($request->id);

        $user = User::where('id', $loan->user_id)->first();

        LoanRepayment::where('id', $request->id)->update([
            'status'         => $request->status,
        ]);
        
        $mailData = [
            'first_name' => $user->first_name,
            'loan_amount' => $loan->amount,
        ];

        if ($request->status === 'Overdue') {
            Notification::send($user, new LoanFlagNotification($mailData));
        }

        return back();
    }
}
