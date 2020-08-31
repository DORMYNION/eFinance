<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Loan;
use App\LoanAmount;
use App\LoanRepayment;
use App\Payment;
use App\User;
use Paystack;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:user']);
    }
    
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }
    
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $paymentData = $paymentDetails['data'];
        $paymentMetaData = $paymentDetails['data']['metadata'];

        // dd($paymentDetails, $paymentData);
        
        $paidAmount = $paymentData['amount'] / 100.00;
        
        $user = auth()->user();
        $user->load('userLoans');
        
        if ($paymentDetails['status'] === true && $paymentData['status'] === 'success' && $paymentData['amount'] === 5000) {
            // dd($paymentData['amount']);
            
            User::where('email', $paymentData['customer']['email'])->update([
                'customer_code'          => $paymentData['customer']['customer_code'],
                'authorization_code'     => $paymentData['authorization']['authorization_code'],
                'payment_method'         => 'Paystack',
            ]);
            
            return redirect()->route('user.loan')->with('message',  __('global.verification_success'));
        }

        if($paymentDetails['status'] === true && $paymentData['status'] === 'success') {
            $getLoan            = (isset($paymentMetaData['loan_id']))            ? Loan::where('id', $paymentMetaData['loan_id'])->first()                      : false;
            $getLoanAmount      = (isset($paymentMetaData['loan_amount_id']))     ? LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->first()         : false;
            $getLoanRepayment   = (isset($paymentMetaData['loan_repayment_id']))  ? LoanRepayment::where('id', $paymentMetaData['loan_repayment_id'])->first()   : false;

            $tPaid = $getLoanAmount->paid + $paidAmount;
            $bLeft = $getLoanAmount->balance - $paidAmount;
            
            if (isset($paymentMetaData['loan_repayment_id']) && $getLoanRepayment !== false && $paymentMetaData['payment_type'] === 'Next Payment') {
                if ($tPaid < round($getLoanAmount->total, 2) && $bLeft != 0) {
                    $loan = Loan::where('id', $paymentMetaData['loan_id'])->update(['status' => 'Partially Paid']);
                    $loanAmount = LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->update([
                        'balance'             => number_format((float)$bLeft, 2, '.', ''),
                        'paid'                => number_format((float)$tPaid, 2, '.', ''),
                        'status'              => 'Partially Paid',
                    ]);
                } else {
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
                    return redirect()->route('user.loan')->with('message',  __('global.payment_success'));
                }
            } elseif (round($paidAmount) >= round($getLoanAmount->balance) && $paymentMetaData['payment_type'] === 'Full Payment') {

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
                    return redirect()->route('user.loan')->with('message',  __('global.payment_success'));
                }
            } elseif (round($paidAmount) <= round($getLoanAmount->balance) && $paymentMetaData['payment_type'] === 'Custom Payment') {
                if ($tPaid < round($getLoanAmount->total, 2) && $bLeft != 0) {
                    $loan = Loan::where('id', $paymentMetaData['loan_id'])->update(['status' => 'Partially Paid']);
                    $loanAmount = LoanAmount::where('id', $paymentMetaData['loan_amount_id'])->update([
                        'balance'             => number_format((float)$bLeft, 2, '.', ''),
                        'paid'                => number_format((float)$tPaid, 2, '.', ''),
                        'status'              => 'Partially Paid',
                    ]);
                } else {
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
                    'status'            => $paymentData['status'],
                    'loan_id'           => $paymentMetaData['loan_id'],
                    'user_id'           => $paymentMetaData['user_id'],
                    'paid_at'           => date('Y-m-d', strtotime($paymentData['paid_at'])),
                    'reference'         => $paymentData['reference'],
                    'payment_type'      => $paymentMetaData['payment_type'],
                    'payment_method'    => 'Paystack',
                    'loan_amount_id'    => $paymentMetaData['loan_amount_id'],
                ]);

                if($loan && $loanAmount  && $payment) {
                    return redirect()->route('user.loan')->with('message',  __('global.payment_success'));
                }
            }
        }
        return redirect()->route('user.loan')->with('message',  __('global.payment_success'));
    }
}
