<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Loan;
use App\LoanRepayment;
use App\Notifications\LoanDisburedNotification;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:user']);
    }
    
    public function index()
    {
        $user = auth()->user();

        $user->load(['userLoans' => function($query) {
            $query->orderBy('id', 'desc');
        }]);

        $user->load(['userPayments' => function($query) {
            $query->orderBy('id', 'desc');
        }]);

        $pending_loan = $user->userLoans->where('status', 'Pending')->last();
        $current_loan = $user->userLoans->whereIn('status', ['Due', 'Disbursed', 'Partially Paid'])->last();
        $approved_loan = $user->userLoans->whereIn('status', ['Approved'])->last();
        $awaiting_loan = $user->userLoans->whereIn('status', ['Awaiting Disbursment'])->last();

        if (isset($current_loan->loanAmounts)) {
            $current_loan->load(['loanAmounts' => function($query) {
                $query->where('status', '!=', 'Paid')->latest();
            }]);
        }

        $loan_amount = null;
        $last_payment = null;
        $next_payment = null;

        if (isset($current_loan->loanAmounts)) {
            $loan_amount = $current_loan->loanAmounts->last();
            if (isset($loan_amount)) {
                $last_payment = Payment::where('loan_amount_id', $loan_amount->id)->latest()->first();
                
                $next_payment = LoanRepayment::where('status', 'Pending')->first();
                if (isset($next_payment)) {
                    if ($loan_amount->repayment_option == 'Interest and Principal payable at maturity') {
                        $next_payment->amount = $loan_amount->balance; 
                    } elseif ($loan_amount->repayment_option == 'Interest payable monthly and Principal at maturity') {
                        $next_payment->amount = $next_payment->amount; 
                    } else {
                        $next_payment->amount = ($next_payment->tenor * $next_payment->amount) - $loan_amount->paid; 
                    }
                    
                }
            }
        }
        

        return view('user.loan.index', compact('user', 'pending_loan', 'current_loan', 'approved_loan', 'awaiting_loan', 'loan_amount', 'last_payment', 'next_payment'));
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        Loan::create($request->all() + ['user_id' => auth()->user()->id]);

        return back()->with('message', __('global.create_loan_success'));
    }
    
    public function update(Request $request)
    {
        $loan = Loan::find($request->id);

        Loan::where('id', $request->id)->update([
            "status"        => $request->status,
            "loan_duration" => $request->loan_duration,
            "loan_amount"   => $request->loan_amount,
            "interest"      => $request->interest,
            "total"         => $request->total,
        ]);

        if ($request->status === 'Awaiting Disbursment') {

            $user = User::where('id', 1)->first();
            
            $mailData = [
                'first_name' => $user->first_name,
                'loan_amount' => $loan->loan_amount,
            ];

            // Notification::send($user, new LoanDisburedNotification($mailData));
        }

        return back()->with('message', __('global.update_loan_success'));
    }

    public function delete(Request $request)
    {        
        Loan::find($request->id)->delete();

        return back()->with('message', __('global.document_delete_success'));
    }

}
