<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Loan;
use App\LoanAmount;
use App\LoanRepayment;
use App\Payment;
use Paystack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{


    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $paymentData = $paymentDetails['data'];
        $paymentMetaData = $paymentDetails['data']['metadata'];

        $paidAmount = $paymentData['amount'] / 100.00;

        $user = auth()->user();
        $user->load('userLoans');

        // dd($paymentDetails);
        // dd($paymentData);
        // dd($paidAmount);
        // dd($paymentMetaData);

        if($paymentDetails['status'] === true && $paymentData['status'] === 'success') {
            $getLoan            = (isset($paymentMetaData['loan_id']))            ? Loan::where('id', $paymentMetaData['loan_id'])->first()                      : false;
            $getLoanAmount      = (isset($paymentMetaData['loan_amount_id']))     ? LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->first()         : false;
            $getLoanRepayment   = (isset($paymentMetaData['loan_repayment_id']))  ? LoanRepayment::where('id', $paymentMetaData['loan_repayment_id'])->first()   : false;

            // dd($getLoanAmount);
            // dd($getLoanRepayment);
            // dd($getLoan, $getLoanAmount, $getLoanRepayment);

            $tPaid = $getLoanAmount->paid + $paidAmount;
            $bLeft = $getLoanAmount->balance - $paidAmount;
            
            if (isset($paymentMetaData['loan_repayment_id']) && $getLoanRepayment !== false && $paymentMetaData['payment_type'] = 'Next Payment') {

                // dd($paymentMetaData['payment_type']);
                
                if ($tPaid < round($getLoanAmount->total, 2) && $bLeft != 0) {
                    $loan = Loan::where('id', $paymentMetaData['loan_id'])->update(['status' => 'Partially Paid']);
                    $loanAmount = LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->update([
                        'balance'             => number_format((float)$bLeft, 2, '.', ''),
                        'paid'                => number_format((float)$tPaid, 2, '.', ''),
                        'status'              => 'Partially Paid',
                    ]);
                } else {
                    // dd(false);
                    $loan = Loan::where('id', $paymentMetaData['loan_id'])->update(['status' => 'Fully Paid']);
                    $loanAmount = LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->update([
                        'balance'             => number_format((float)$bLeft, 2, '.', ''),
                        'paid'                => number_format((float)$tPaid, 2, '.', ''),
                        'status'              => 'Fully Paid',
                    ]);
                }

                $loanRepayment = LoanRepayment::where('id', $paymentMetaData['loan_repayment_id'])->update(["status" => 'Paid']);
                
                $payment = Payment::create([
                    'amount'            => number_format((float)$paidAmount, 2, '.', ''),
                    'status'            => $paymentData['status'],
                    'loan_id'           => $paymentMetaData['loan_id'],
                    'user_id'           => $paymentMetaData['user_id'],
                    'paid_at'           => date('Y-m-d', strtotime($paymentData['paid_at'])),
                    'reference'         => $paymentData['reference'],
                    'payment_type'      => $paymentMetaData['payment_type'],
                    'payment_method'    => 'Paystack',
                    'loan_amount_id'    => $paymentMetaData['loan_amount_id'],
                ]);

                if($loan && $loanAmount && $loanRepayment && $payment) {
                    return redirect()->route('user.loan')->with('message',  __('global.create_loan_success'));
                }

                

                dd($getLoanRepayment);
                # code...
            } elseif (round($paidAmount) >= round($getLoanAmount->balance) && $paymentMetaData['payment_type'] = 'Full Payment') {

                dd($paymentMetaData['payment_type']);

                $loan = Loan::where('id', $paymentMetaData['loan_id'])->update(['status' => 'Fully Paid']);

                $loanAmount = LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->update([
                    'balance'             => number_format((float)$bLeft, 2, '.', ''),
                    'paid'                => number_format((float)$paidAmount, 2, '.', ''),
                    'status'              => 'Fully Paid',
                ]);

                $loanRepayment = LoanRepayment::where([
                    ['loan_id',         $paymentMetaData['loan_id']],
                    ['user_id',         $paymentMetaData['user_id']],
                    ['loan_amount_id',  $paymentMetaData['loan_amount_id']],
                ])->update(["status" => 'Paid']);
                
                $payment = Payment::create([
                    'amount'            => number_format((float)$paidAmount, 2, '.', ''),
                    'status'            => $paymentData['status'],
                    'loan_id'           => $paymentMetaData['loan_id'],
                    'user_id'           => $paymentMetaData['user_id'],
                    'paid_at'           => date('Y-m-d', strtotime($paymentData['paid_at'])),
                    'reference'         => $paymentData['reference'],
                    'payment_type'      => $paymentMetaData['payment_type'],
                    'payment_method'    => 'Paystack',
                    'loan_amount_id'    => $paymentMetaData['loan_amount_id'],
                ]);

                if($loan && $loanAmount && $loanRepayment && $payment) {
                    return redirect()->route('user.loan')->with('message',  __('global.create_loan_success'));
                }
            } elseif (round($paidAmount) <= round($getLoanAmount->balance) && $paymentMetaData['payment_type'] = 'Custom Payment') {
                if ($tPaid < round($getLoanAmount->total, 2) && $bLeft != 0) {
                    $loan = Loan::where('id', $paymentMetaData['loan_id'])->update(['status' => 'Partially Paid']);
                    $loanAmount = LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->update([
                        'balance'             => number_format((float)$bLeft, 2, '.', ''),
                        'paid'                => number_format((float)$tPaid, 2, '.', ''),
                        'status'              => 'Partially Paid',
                    ]);
                } else {
                    dd(false);
                    $loan = Loan::where('id', $paymentMetaData['loan_id'])->update(['status' => 'Fully Paid']);
                    $loanAmount = LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->update([
                        'balance'             => number_format((float)$bLeft, 2, '.', ''),
                        'paid'                => number_format((float)$tPaid, 2, '.', ''),
                        'status'              => 'Fully Paid',
                    ]);
                }

                $getLoanRepayments = LoanRepayment::where([
                    ['loan_id',         $paymentMetaData['loan_id']],
                    ['user_id',         $paymentMetaData['user_id']],
                    ['loan_amount_id',  $paymentMetaData['loan_amount_id']],
                    // ['status',          'Pending'],
                ])->get();

                $key = 0 ;
                
                for ($i=1; $i <= $getLoanRepayments->count() ; $i++) { 
                    // echo($tPaid.'<br>');
                    # code...
                    if($tPaid >= $getLoanRepayments[$key]->amount) {
                        $tPaid = $tPaid - $getLoanRepayments[$key]->amount;

                        $loanRepayment = LoanRepayment::where('id', $getLoanRepayments[$key]->id)->update(["status" => 'Paid']);
                        
                        // $paidAmount = $paidAmount - $getLoanRepayments[$key]->amount;
                        // echo('New'.$tPaid.'<br>');
                        // echo('New'.$loanRepayment.'<br>');
                        // echo($getLoanRepayments[$key]['amount']);
                    }

                    // echo('jods<br>');
                    // echo($getLoanRepayments[$key].'<br>');
                    $key++;
                }
                // dd($paymentMetaData['payment_type']);
                // dd($getLoanRepayments);
                $payment = Payment::create([
                    'amount'            => number_format((float)$paidAmount, 2, '.', ''),
                    'status'            => $paymentData['status'],
                    'loan_id'           => $paymentMetaData['loan_id'],
                    'user_id'           => $paymentMetaData['user_id'],
                    'paid_at'           => date('Y-m-d', strtotime($paymentData['paid_at'])),
                    'reference'         => $paymentData['reference'],
                    'payment_type'      => $paymentMetaData['payment_type'],
                    'payment_method'    => 'Paystack',
                    'loan_amount_id'    => $paymentMetaData['loan_amount_id'],
                ]);

                if($loan && $loanAmount && $loanRepayment && $payment) {
                    return redirect()->route('user.loan')->with('message',  __('global.create_loan_success'));
                }
            }
        }

        // Remeber to add payment type [Full, Next, Cutsom] Payment
        // Full payment should pay balance not total



        $userLoan = $user->userLoans->whereIn('status', ['Due', 'Disbursed', 'Partially Paid'])->last();

        if($paymentDetails['status'] === true && $paymentData['status'] === 'success') {

            Payment::create([
                'amount'            => $userLoan->total,
                'status'            => $paymentData['status'],
                'loan_id'           => $userLoan->id,
                'user_id'           => $user->id,
                'paid_at'           => date('Y-m-d', strtotime($paymentData['paid_at'])),
                'reference'         => $paymentData['reference'],
                'payment_method'    => 'Paystack',
            ]);

            Loan::where('id', $userLoan->id)->update([
                "status"        => 'Paid',
            ]);
        }

        return redirect()->route('user.loan')->with('message',  __('global.create_loan_success'));

    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        // dd($user);
        
        $user->load('userPayments');
        
        // dd($user);

        return view('user.payment.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
