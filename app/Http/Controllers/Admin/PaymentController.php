<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Loan;
use App\LoanAmount;
use App\LoanRepayment;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:staff']);
    }
    
    public function index()
    {
        $payments = Payment::orderBy('id', 'DESC')->get();

        $payments->load('user', 'loan');

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $loans = Loan::all()->pluck('viewed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $loan_amounts = LoanAmount::all()->pluck('total', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payments.create', compact('loans', 'loan_amounts'));
    }

    public function store(StorePaymentRequest $request)
    {
        $getLoan            = (isset($request->loan_id))            ? Loan::where('id', $request->loan_id)->first()                      : false;
        $getLoanAmount      = (isset($request->loan_amount_id))     ? LoanAmount::where('id', $request->loan_amount_id)->first()         : false;
        $getLoanRepayment   = (isset($request->loan_repayment_id))  ? LoanRepayment::where('id', $request->loan_repayment_id)->first()   : false;
        
        $paidAmount = $request->amount;

        $tPaid = $getLoanAmount->paid + $paidAmount;
        $bLeft = $getLoanAmount->balance - $paidAmount;
        
        if (round($paidAmount) >= round($getLoanAmount->balance) && $paymentMetaData['payment_type'] = 'Full Payment') {

            $loan = Loan::where('id', $request->loan_id)->update(['status' => 'Fully Paid']);

            $loanAmount = LoanAmount::where('id', $request->loan_amount_id)->update([
                'balance'             => number_format((float)$bLeft, 2, '.', ''),
                'paid'                => number_format((float)$paidAmount, 2, '.', ''),
                'status'              => 'Fully Paid',
            ]);

            $loanRepayment = LoanRepayment::where([
                ['loan_id',         $request->loan_id],
                ['user_id',         $request->user_id],
                ['loan_amount_id',  $request->loan_amount_id],
            ])->update(["status" => 'Paid']);
            
            $payment = Payment::create([
                'amount'            => number_format((float)$paidAmount, 2, '.', ''),
                'status'            => 'Success',
                'loan_id'           => $request->loan_id,
                'user_id'           => $request->user_id,
                'paid_at'           => date('Y-m-d'),
                'reference'         => $request->reference,
                'payment_type'      => 'Full Payment',
                'payment_method'    => $request->payment_method,
                'loan_amount_id'    => $request->loan_amount_id,
            ]);

            if($loan && $loanAmount && $loanRepayment && $payment) {
                return redirect()->route('admin.payments.index')->with('message',  __('global.payment_success'));
            }
        } elseif (round($paidAmount) <= round($getLoanAmount->balance) && $paymentMetaData['payment_type'] = 'Custom Payment') {
            if ($tPaid < round($getLoanAmount->total, 2) && $bLeft != 0) {
                $loan = Loan::where('id', $request->loan_id)->update(['status' => 'Partially Paid']);
                $loanAmount = LoanAmount::where('id', $request->loan_amount_id)->update([
                    'balance'             => number_format((float)$bLeft, 2, '.', ''),
                    'paid'                => number_format((float)$tPaid, 2, '.', ''),
                    'status'              => 'Partially Paid',
                ]);
            } else {
                $loan = Loan::where('id', $request->loan_id)->update(['status' => 'Fully Paid']);
                $loanAmount = LoanAmount::where('id', $request->loan_amount_id)->update([
                    'balance'             => number_format((float)$bLeft, 2, '.', ''),
                    'paid'                => number_format((float)$tPaid, 2, '.', ''),
                    'status'              => 'Fully Paid',
                ]);
            }

            $getLoanRepayments = LoanRepayment::where([
                ['loan_id',         $request->loan_id],
                ['user_id',         $request->user_id],
                ['loan_amount_id',  $request->loan_amount_id],
            ])->get();

            $key = 0 ;
            
            for ($i=1; $i <= $getLoanRepayments->count() ; $i++) { 
                if($tPaid >= $getLoanRepayments[$key]->amount) {
                    $tPaid = $tPaid - $getLoanRepayments[$key]->amount;

                    $loanRepayment = LoanRepayment::where('id', $getLoanRepayments[$key]->id)->update(["status" => 'Paid']);
                }
                $key++;
            }
            
            $payment = Payment::create([
                'amount'            => number_format((float)$paidAmount, 2, '.', ''),
                'status'            => 'Success',
                'loan_id'           => $request->loan_id,
                'user_id'           => $request->user_id,
                'paid_at'           => date('Y-m-d'),
                'reference'         => $request->reference,
                'payment_type'      => 'Custom Payment',
                'payment_method'    => $request->payment_method,
                'loan_amount_id'    => $request->loan_amount_id,
            ]);

            if($loan && $loanAmount  && $payment) {
                return redirect()->route('admin.payments.index')->with('message',  __('global.payment_success'));
            }
        }

        return redirect()->route('admin.payments.index')->with('message',  __('global.payment_success'));
    }
}
