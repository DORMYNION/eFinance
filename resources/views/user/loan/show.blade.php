@extends('layouts.user')
@section('mainContent')

                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-head-sub"><a class="back-to" href="{{ route('user.loan')}}"><em class="icon ni ni-arrow-left"></em><span>My Loans</span></a></div>
                                        <div class="nk-block-between-md g-4">
                                            <div class="nk-block-head-content">
                                                <h2 class="nk-block-title fw-normal">Active Loan</h2>
                                                <div class="nk-block-des">
                                                    @php
                                                        $a = strtotime($current_loan->loanAmounts[0]->due_date);
                                                        // dd(date('M d, Y',$a));
                                                    @endphp
                                                <p>Your loan will be due on {{ date('M d, Y',$a) }} <span class="text-primary"><em class="icon ni ni-info"></em></span></p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content">
                                                
                                                <ul class="nk-block-tools justify-content-md-end g-4 flex-wrap">
                                                    @php
                                                        // dd($loan_amount);
                                                    @endphp
                                                    <li class="order-md-last">
                                                        <form method="POST" action="{{ route('user.payment.pay') }}" accept-charset="UTF-8" role="form">
                                                            @csrf
                                                            <input type="hidden" name="email"     value="{{ $user->email }}"> 
                                                            <input type="hidden" name="amount"    value="{{ round($loan_amount->balance,2) * 100 }}"> 
                                                            <input type="hidden" name="quantity"  value="1">
                                                            <input type="hidden" name="currency"  value="NGN">
                                                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">    
                                                            <input type="hidden" name="metadata" value="{{ json_encode($array = [
                                                                'loan_id'           => $loan_amount->loan_id, 
                                                                'user_id'           => $loan_amount->user_id, 
                                                                'payment_type'      => 'Full Payment', 
                                                                'loan_amount_id'    => $loan_amount->id, 
                                                            ]) }}">


                                                            <button class="btn btn-auto btn-dim btn-success" type="submit" value="Pay All Now!"><em class="icon ni ni-cc-secure"></em><span>Pay All Loan Now!</span></button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <div class="nk-block-des">
                                                            <p class="mb-0">Total Loan Balance</p>
                                                            <h4 class="nk-block-title fw-normal">NGN {{ number_format($current_loan->loanAmounts[0]->balance, 2) }}</h4>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <div class="card card-bordered">
                                                    <div class="card-inner-group">
                                                        <div class="card-inner">
                                                            <div class="sp-plan-head">
                                                                <h6 class="title">Loan Repayment Plan</h6>                                                                
                                                            </div>
                                                            <div class="sp-plan-desc sp-plan-desc-mb">
                                                                @foreach ($current_loan->loanRepayments as $key => $loanRepayment)
                                                                <ul class="row gx-1">
                                                                    <li class="col-sm-4">
                                                                        <p><span class="text-soft">Due on</span> {{ Carbon\Carbon::parse($loanRepayment->due_date)->format('F d, Y') }}</p>
                                                                    </li>
                                                                    <li class="col-sm-4">
                                                                        <p><span class="text-soft">Price</span>NGN {{ number_format($loanRepayment->amount, 2) }} </p>
                                                                    </li>
                                                                    <li class="col-sm-4">
                                                                        <p><span class="text-soft">Status</span> {{ $loanRepayment->status }}</td></p>
                                                                    </li>
                                                                </ul>
                                                                @endforeach
                                                                @for ($i = 0; $i < $current_loan->loan_duration; $i++)
                                                                @endfor
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner">
                                                            <div class="sp-plan-head-group">
                                                                <div class="sp-plan-head">
                                                                    <h6 class="title">Custom Payment</h6>
                                                                </div>
                                                            </div>
                                                            <div class="sp-plan-payopt">
                                                                <div class="cc-pay">
                                                                    <h6 class="title">Enter Amount</h6>
                                                                    <form method="POST" action="{{ route('user.payment.pay') }}" accept-charset="UTF-8" role="form" autocomplete="off">
                                                                        <ul class="cc-pay-method">
                                                                            @csrf
                                                                            <input type="hidden" name="email" value="{{ $user->email }}"> 
                                                                            <input type="hidden" name="amount" id="amount" value="">
                                                                            <input type="hidden" name="quantity" value="1">
                                                                            <input type="hidden" name="currency" value="NGN">
                                                                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">    
                                                                            <input type="hidden" name="metadata" value="{{ json_encode($array = [
                                                                                'loan_id'           => $loan_amount->loan_id, 
                                                                                'user_id'           => $loan_amount->user_id, 
                                                                                'payment_type'      => 'Custom Payment', 
                                                                                'loan_amount_id'    => $loan_amount->id, 
                                                                            ]) }}">
                                                                            
                                                                            <li class="cc-pay-dd dropdown">
                                                                                <input class="form-control" id="customAmount" type="text" name="customAmount" autocomplete="off"> 
                                                                            </li>
                                                                            <li class="cc-pay-btn">
                                                                                <button class="btn btn-secondary" type="submit" value="Pay Now"><span>Pay Now</span> <em class="icon ni ni-arrow-long-right"></em></button>
                                                                            </li>
                                                                        </ul>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner-group -->
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-xl-4">
                                                <div class="card card-bordered card-full d-none d-xl-block">
                                                    {{-- <div class="nk-help-plain card-inner text-center"> --}}
                                                        <div class="card-inner-group">
                                                            <div class="card-inner">
                                                                    <div class="sp-plan-head">
                                                                        <h6 class="title">Next Payment</h6>
                                                                    </div>
                                                                    <div class="sp-plan-desc sp-plan-desc-mb">
                                                                        <ul class="row gx-1">
                                                                            <li class="col-sm-6">
                                                                                @php
                                                                                    // dd($next_payment);
                                                                                @endphp
                                                                                <form method="POST" action="{{ route('user.payment.pay') }}" accept-charset="UTF-8" role="form">
                                                                                    @csrf
                                                                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                                                                    <input type="hidden" name="amount" id="amount" value="{{ round($next_payment->amount, 2) * 100 }} ">
                                                                                    <input type="hidden" name="quantity" value="1">
                                                                                    <input type="hidden" name="currency" value="NGN">
                                                                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
                                                                                    <input type="hidden" name="metadata" value="{{ json_encode($array = [
                                                                                        'loan_id'           => $next_payment->loan_id, 
                                                                                        'user_id'           => $next_payment->user_id, 
                                                                                        'payment_type'      => 'Next Payment', 
                                                                                        'loan_amount_id'    => $next_payment->loan_amount_id, 
                                                                                        'loan_repayment_id' => $next_payment->id, 
                                                                                    ]) }}">
                                                                                    
                                                                                    <button class="btn btn-secondary" type="submit" value="Pay Now"><span>Pay Now</span> <em class="icon ni ni-arrow-long-right"></em></button>
                                                                                </form>
                                                                            </li>
                                                                            <li class="col-sm-6 sp-plan-amount pt-3">
                                                                                <span class="amount">{{ number_format($next_payment->amount, 2) }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                            </div><!-- .card-inner -->
                                                            <div class="card-inner">
                                                                    <div class="sp-plan-head">
                                                                        <h6 class="title">Last Payment</h6>
                                                                    </div>
                                                                    <div class="sp-plan-desc sp-plan-desc-mb">
                                                                        @if($last_payment === [])
                                                                            <ul class="row gx-1">
                                                                                <li class="col-sm-8">
                                                                                    <span class="ff-italic text-soft">Paid at {{ $last_payment->date }}</span>
                                                                                </li>
                                                                                <li class="col-sm-4 sp-plan-amount">
                                                                                    <span class="amount">NGN {{ $last_payment->amount }}</span>
                                                                                </li>
                                                                            </ul>
                                                                        @else
                                                                            <p>No payment made yet.</p>                                                                            
                                                                        @endif
                                                                    </div>
                                                            </div><!-- .card-inner -->
                                                        </div><!-- .card-inner-group -->
                                                    </div>
                                                {{-- </div><!-- .card --> --}}
                                                <div class="card card-bordered d-xl-none">
                                                    <div class="card-inner">
                                                        <div class="nk-help">
                                                            <div class="nk-help-img">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                                                    <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff" />
                                                                    <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                                                    <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                                    <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                                    <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                                    <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                                    <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                                    <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff" />
                                                                    <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff" />
                                                                    <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                                    <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                                                    <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10" /></svg>
                                                            </div>
                                                            <div class="nk-help-text">
                                                                <h5>Maintainance Support</h5>
                                                                <p class="text-soft">You can get additionally weekly maintainance with premium support, only <span class="ext-base">$99.00</span> per year.</p>
                                                            </div>
                                                            <div class="nk-help-action">
                                                                <a href="#" class="btn btn-lg btn-primary">Get Support Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                        </div>
                                    </div><!-- .nk-block --> 
                               
        <!-- @@Modal - Subscription Change @s -->
        <div class="modal fade" tabindex="-1" id="subscription-change">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-md">
                        <div class="sp-package text-center">
                            <div class="sp-package-head">
                                <h4 class="title">Change Subscription</h4>
                                <p class="text-soft">This change will become effective on Jan 14, 2020 on your account.</p>
                            </div>
                            <ul class="sp-package-plan nav nav-switch nav-tabs">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">Yearly</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Monthly</a>
                                </li>
                            </ul>
                            <ul class="sp-package-list">
                                <li class="sp-package-item">
                                    <input class="sp-package-choose" type="radio" name="subscription-pack-plan" id="pack-plan-entprise" checked="">
                                    <label class="sp-package-desc" for="pack-plan-entprise">
                                        <span class="sp-package-info">
                                            <span class="sp-package-title title">Enterprise Plan <span class="badge badge-primary badge-pill">Current</span></span>
                                            <span class="sp-package-detail">Unlimited Access / $599.00 USD / Year</span>
                                        </span>
                                        <span class="sp-package-price">
                                            <span class="sp-package-amount yearly">
                                                <span class="amount">$599.00</span>
                                                <span class="text-soft">Yearly</span>
                                            </span>
                                            <span class="sp-package-amount monthly d-none">
                                                <span class="amount">$99.00</span>
                                                <span class="text-soft">Monthly</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                                <li class="sp-package-item">
                                    <input class="sp-package-choose" type="radio" name="subscription-pack-plan" id="pack-plan-pro">
                                    <label class="sp-package-desc" for="pack-plan-pro">
                                        <span class="sp-package-info">
                                            <span class="sp-package-title title">NioPro Plan</span>
                                            <span class="sp-package-detail">Unlimited Access / $249.00 USD / Year</span>
                                        </span>
                                        <span class="sp-package-price">
                                            <span class="sp-package-amount yearly">
                                                <span class="amount">$299.00</span>
                                                <span class="text-soft">Yearly</span>
                                            </span>
                                            <span class="sp-package-amount monthly d-none">
                                                <span class="amount">$49.00</span>
                                                <span class="text-soft">Monthly</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                                <li class="sp-package-item">
                                    <input class="sp-package-choose" type="radio" name="subscription-pack-plan" id="pack-plan-free">
                                    <label class="sp-package-desc" for="pack-plan-free">
                                        <span class="sp-package-info">
                                            <span class="sp-package-title title">Free Plan</span>
                                            <span class="sp-package-detail">Free Access / $0.00 USD / Year</span>
                                        </span>
                                        <span class="sp-package-price">
                                            <span class="sp-package-amount yearly">
                                                <span class="amount">$0.00</span>
                                                <span class="text-soft">Yearly</span>
                                            </span>
                                            <span class="sp-package-amount monthly d-none">
                                                <span class="amount">$0.00</span>
                                                <span class="text-soft">Monthly</span>
                                            </span>
                                        </span>
                                    </label>
                                </li>
                            </ul>
                            <div class="sp-package-action">
                                <a href="#" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#subscription-confirmed">Change Plan</a>
                                <a href="#" class="btn btn-dim btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#subscription-cancel">Cancel Plan</a>
                            </div>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- .modal -->
        <!-- @@Modal - Confirm Plan @s -->
        <div class="modal fade" tabindex="-1" id="subscription-confirmed">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-body modal-body-md text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                            <h4 class="nk-modal-title">Plan Change Successfully!</h4>
                            <div class="nk-modal-text">
                                <p>It will effect at the end of your current billing cycle on <strong>01 Feb 2020</strong>. We sent you a confirmation email <strong>(this may take up to 3 hours to receive)</strong>.</p>
                                <p class="sub-text-sm"><a href="#">Click here</a> to learn more about subscription plan.</p>
                            </div>
                            <div class="nk-modal-action-lg">
                                <a href="#" class="btn btn-mw btn-light" data-dismiss="modal">Return</a>
                            </div>
                        </div>
                    </div><!-- .modal-body -->
                    <div class="modal-footer bg-lighter">
                        <div class="text-center w-100">
                            <p>Earn upto $25 for each friend your refer! <a href="#">Invite friends</a></p>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modla-dialog -->
        </div><!-- .modal -->
        <!-- @@Modal - Subscription Cancle @s -->
        <div class="modal fade" tabindex="-1" id="subscription-cancel">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-md">
                        <h4 class="nk-modal-title title">Cancel Your Subscription</h4>
                        <p><strong>Are you sure you want to cancel your subscription?</strong></p>
                        <p>If you cancel, you'll lose your all demand. But you can re-subscription your favourite plan any time.</p>
                        <div class="form">
                            <div class="form-group">
                                <label class="form-label">Enter your password to confirm cancellation</label>
                                <div class="form-control-wrap">
                                    <input type="password" class="form-control" placeholder="*********">
                                </div>
                                <div class="form-note">
                                    <span>You'll receieve confirmation email once successfully cancel your plan.</span>
                                </div>
                            </div>
                            <ul class="align-center flex-wrap g-3">
                                <li>
                                    <button class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#subscription-cancel-confirmed">Cancel Subscription</button>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-light" data-dismiss="modal">Never mind, don't cancel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modla-dialog -->
        </div><!-- .modal -->
        <!-- @@Modal - Subscription Cancle Confirmed @s -->
        <div class="modal fade" tabindex="-1" id="subscription-cancel-confirmed">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body modal-body-md text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success-dim text-success"></em>
                            <h4 class="nk-modal-title">Successfully Cancelled</h4>
                            <div class="nk-modal-text">
                                <p>It will effect at the end of your current billing cycle on <strong>01 Feb 2020</strong>. We sent you a confirmation email <strong>(this may take up to 3 hours to receive)</strong>.</p>
                                <p class="sub-text-sm"><a href="#">Click here</a> to learn more about subscription plan.</p>
                            </div>
                            <div class="nk-modal-action-lg">
                                <a href="#" class="btn btn-mw btn-light" data-dismiss="modal">Return</a>
                            </div>
                        </div>
                    </div><!-- .modal-body -->
                    <div class="modal-footer bg-lighter">
                        <div class="text-center w-100">
                            <p>You can easily re-subscription your favourite plan any time.</p>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modla-dialog -->
        </div><!-- .modal -->

@endsection
@section('scripts')
    <script>
        var a = document.getElementById('customAmount')
        a.addEventListener('keyup', function() {
        var b = a.value*100;
            document.getElementById('amount').value = b;
        });    
    </script>
@endsection