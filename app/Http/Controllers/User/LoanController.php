<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Requests\UpdateUserLoanRequest;
use App\Loan;
use App\LoanAmount;
use App\LoanRepayment;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'can:user']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $user->load(['userLoans' => function($query) {
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
        # code...

        // dd($current_loan);

        return view('user.loan.index', compact('user', 'pending_loan', 'current_loan', 'approved_loan', 'awaiting_loan'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Loan::create($request->all() + ['user_id' => auth()->user()->id]);

        return back()->with('message', __('global.create_loan_success'));
    }
    
    public function update(Request $request)
    {
        Loan::where('id', $request->id)->update([
            "status"        => $request->status,
            "loan_duration" => $request->loan_duration,
            "loan_amount"   => $request->loan_amount,
            "interest"      => $request->interest,
            "total"         => $request->total,
        ]);

        return back()->with('message', __('global.update_loan_success'));
    }

    public function delete(Request $request)
    {        
        Loan::find($request->id)->delete();

        return back()->with('message', __('global.document_delete_success'));
    }

    public function show() {

        $user = auth()->user();

        $latest_laon = $user->load('userLoans');

        $current_loan = $latest_laon->userLoans->last();

        $loan_amount = $current_loan->loanAmounts->last();

        $last_payment = Payment::where('loan_amount_id', $loan_amount->id)->get();

        $next_payment = LoanRepayment::where('status', 'Pending')->first();


        $next_payment->amount = ($next_payment->tenor * $next_payment->amount) - $loan_amount->paid; 
        

        // $current_loan->load('loanAmounts');

        // dd($loan_amount);
        // dd($last_payment);
        // dd(
        //     $next_payment->tenor, 
        //     $next_payment->amount, 
        //     $next_payment->tenor * $next_payment->amount, 
        //     $next_payment->tenor * $next_payment->amount - $loan_amount->paid, 
        //     $loan_amount->paid, 
        //     $loan_amount->paid = ($next_payment->tenor * $next_payment->amount )- $loan_amount->paid, 
        //     $loan_amount->balance);
        // dd($next_payment);

        return view('user.loan.show', compact('user', 'current_loan', 'loan_amount', 'last_payment', 'next_payment'));
    }

}
