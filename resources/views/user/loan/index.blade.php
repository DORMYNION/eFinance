@extends('layouts.user')
@section('mainContent')

<div class="nk-block-head nk-block-head-lg">
    <div class="nk-block-between-md g-4">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">My Loans</h2>
            <div class="nk-block-des">
                <p>Here is your list of loans. <span class="text-success"><em class="icon ni ni-info"></em></span></p>
            </div>
        </div>
    </div>
</div><!-- .nk-block-head -->

    @if($current_loan)
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title"><a href=""><span>NGN</span>{{ number_format($current_loan->loan_amount, 2) }} <span class="badge badge-primary badge-pill">{{ $current_loan->status }}</span></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> {{ $current_loan->created_at->format('M d, Y') }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> {{ $current_loan->loan_duration }} Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> {{ number_format($current_loan->interest, 2) }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> {{ number_format($current_loan->total, 2) }}</p>
                                </li>
                            </ul>
                        </div><!-- .sp-plan-desc -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="sp-plan-action card-inner">
                            @php
                                // $payback = (int)$current_loan->total;round($cart_total,2)
                                $payback = round($current_loan->total,2);
                                // dd($payback);
                                
                            @endphp
                            <div class="sp-plan-btn">
                                {{-- <form method="POST" action="{{ route('user.payment.pay') }}" accept-charset="UTF-8" role="form">
                                    @csrf

                                    <input type="hidden" name="email" value="{{ $user->email }}"> 
                                    <input type="hidden" name="id" value="{{ $current_loan->id }}">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="amount" value="{{ $payback }}"> 
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="currency" value="NGN">
                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > 
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> --}}
                                    
                        
                                    {{-- <button class="btn btn-success" type="submit" value="Pay Now!">Pay Now!</button> --}}
                                    <a class="btn btn-success" href="{{ route('user.loan.show') }}" value="Pay Now!">Pay Now!</a>
                                    {{-- <button class="btn btn-success" type="submit" value="Pay Now!">Pay Now!</button> --}}
                                {{-- </form> --}}
                                </div>
                                
                                <div class="sp-plan-note text-md-center">
                                    <p class="mb-0">Due Date <span>{{ $current_loan->updated_at }}</span></p>
                                    <p>Balance: <span>NGN {{ number_format($current_loan->loanAmounts[0]->balance, 2) }}</span></p>
                                </div>
                            </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .sp-plan -->
        </div><!-- .nk-block -->
    @elseif($awaiting_loan)
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title"><a href=""><span>NGN</span>{{ number_format($awaiting_loan->loan_amount, 2) }} <span class="badge badge-info badge-pill">{{ $awaiting_loan->status }}</span></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> {{ $awaiting_loan->created_at->format('M d, Y') }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> {{ $awaiting_loan->loan_duration }} Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> {{ number_format($awaiting_loan->interest, 2) }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> {{ number_format($awaiting_loan->total, 2) }}</p>
                                </li>
                            </ul>
                        </div><!-- .sp-plan-desc -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="sp-plan-action card-inner">
                            <div class="sp-plan-btn">
                                {{-- <a href="#" class="btn btn-success" data-toggle="modal" data-target="#acceptLoan"><span>Edit Loan</span></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#declineLoan"><span>Delete Loan</span></a> --}}
                            </div>
                            <div class="sp-plan-btn">
                            </div>
                            <div class="sp-plan-note text-md-center">
                                <p>Pls be patient while we disburse your loan.</p>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .sp-plan -->
        </div><!-- .nk-block -->
    @elseif($approved_loan)
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title"><a href=""><span>NGN</span>{{ number_format($approved_loan->loan_amount, 2) }} <span class="badge badge-secondary badge-pill">{{ $approved_loan->status }}</span></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> {{ $approved_loan->created_at->format('M d, Y') }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> {{ $approved_loan->loan_duration }} Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> {{ number_format($approved_loan->interest, 2) }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> {{ number_format($approved_loan->total, 2) }}</p>
                                </li>
                            </ul>
                        </div><!-- .sp-plan-desc -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="sp-plan-action card-inner">
                            <div class="sp-plan-btn">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#acceptLoan"><span>Accept Loan</span></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#declineLoan"><span>Decline Loan</span></a>
                            </div>
                            <div class="sp-plan-btn">
                            </div>
                            <div class="sp-plan-note text-md-center">
                                <p>Pls click the accept button above to accept this loan offer.</p>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .sp-plan -->
        </div><!-- .nk-block -->
    @elseif($pending_loan)
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title text-primary"><span>NGN</span>{{ number_format($pending_loan->loan_amount, 2) }} <span class="badge badge-danger badge-pill">{{ $pending_loan->status }}</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> {{ $pending_loan->created_at->format('M d, Y') }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> {{ $pending_loan->loan_duration }} Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> {{ number_format($pending_loan->interest, 2) }}</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> {{ number_format($pending_loan->total, 2) }}</p>
                                </li>
                            </ul>
                        </div><!-- .sp-plan-desc -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="sp-plan-action card-inner">
                            <div class="sp-plan-btn">
                                {{-- <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editLoan"><span>Edit Loan</span></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteLoan"><span>Delete Loan</span></a> --}}
                            </div>
                            <div class="sp-plan-btn">
                            </div>
                            <div class="sp-plan-note text-md-center">
                                <p>Due Date <span>Loan not approved yet</span></p>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .sp-plan -->
        </div><!-- .nk-block -->
    @else
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner card-inner-lg">
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
                            <h5>No current loan</h5>
                            <p class="text-soft">You can apply for a new loan now.</p>
                        </div>
                        <div class="nk-help-action">
                            <a class="btn btn-lg btn-outline-success" data-toggle="modal" data-target="#applyNow">Apply Now</a>
                        </div>
                    </div><!-- .nk-help -->
                </div>
            </div><!-- .card -->
        </div><!-- .nk-block -->
    @endif
{{-- @endforeach --}}


<div class="nk-block">
    <div class="row g-gs">
        <div class="col-xxl-8">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Loan History</h6>
                        </div>
                    </div>
                </div>
                <div class="card-inner p-0 border-top">
                    <div class="nk-tb-list nk-tb-orders">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col"><span>Request Date</span></div>
                            <div class="nk-tb-col"><span>Loan Duration</span></div>
                            <div class="nk-tb-col"><span>Loan</span></div>
                            <div class="nk-tb-col"><span>Interest</span></div>
                            <div class="nk-tb-col"><span>Total</span></div>
                            <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                        </div>
                        @foreach ($user->userLoans as $userLoan)
                            <div class="nk-tb-item">
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">{{ $userLoan->created_at->format('F d, Y') }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub">{{ $userLoan->loan_duration }} Month(s)</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount"><span>NGN </span>{{ number_format($userLoan->loan_amount, 2) }}</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount"><span>NGN </span>{{ number_format($userLoan->interest, 2) }}</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount"><span>NGN </span>{{ number_format($userLoan->total, 2) }}</span>
                                </div>
                                <div class="nk-tb-col">
                                    @if($userLoan->status === 'Due')
                                        <span class="badge badge-dot badge-dot-xs badge-dark">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Expired')
                                        <span class="badge badge-dot badge-dot-xs badge-black">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Pending')
                                        <span class="badge badge-dot badge-dot-xs badge-danger">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Declined')
                                        <span class="badge badge-dot badge-dot-xs badge-warning">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Approved')
                                        <span class="badge badge-dot badge-dot-xs badge-seccondary">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Disbursed')
                                        <span class="badge badge-dot badge-dot-xs badge-primary">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Fully Paid')
                                        <span class="badge badge-dot badge-dot-xs badge-success">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Partially Paid')
                                        <span class="badge badge-dot badge-dot-xs badge-gray">{{ $userLoan->status }}</span>
                                    @elseif($userLoan->status === 'Awaiting Disbursment')
                                        <span class="badge badge-dot badge-dot-xs badge-info">{{ $userLoan->status }}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                            
                    </div>
                </div>
                <div class="card-inner-sm border-top text-center d-sm-none">
                    <a href="#" class="btn btn-link btn-block">See History</a>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
    </div><!-- .row -->
</div>


@if(!$pending_loan)
 <!-- @@Modal - Apply Now @s -->
 <div class="modal fade" tabindex="-1" id="applyNow">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-header">
                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                    <div class="nk-block-head-content text-center">
                        <h4 class="nk-block-title title fw-normal">Apply for a new Loan</h4>
                        <div class="nk-block-des">
                            <p class="sub-title text-soft">You can modify this application as long as your loan status is pending.</p>
                        </div>
                    </div>
                </div><!-- nk-block -->
            </div>
            <div class="modal-body modal-body-md invest-block">
                <form class="invest-form" method="post" action="{{ route("user.loan.store") }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="Pending">
                    <div class="row gy-gs">
                        <div class="col-12">
                            <div class="invest-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Purpose of Loan</label>
                                </div>
                                <div class="form-control-group">
                                    <div class="form-info"><em class="icon ni ni-arrow-down">&nbsp;&nbsp;</em></div>
                                    <select class="form-control form-control-amount custom-select {{ $errors->has('purpose_of_loan') ? 'is-invalid' : '' }}" name="purpose_of_loan" id="purpose_of_loan" required>
                                        <option value disabled {{ old('purpose_of_loan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Loan::PURPOSE_OF_LOAN_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('purpose_of_loan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- .invest-field --> 
                            <input type="hidden" name="repayment_option" value="monthly">
                            <div class="invest-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Loan Duration</label>
                                </div>
                                <div class="form-control-group">
                                    <div class="form-info">Month(s)</div>
                                    <input type="text" class="form-control form-control-amount form-control-lg" name="loan_duration" value="{{ old('loan_duration','') }}" id="loan_duration" required readonly>
                                    <div class="form-range-slider" id="loanDuration_step"></div>
                                </div>
                                <div class="form-note pt-2">Note: Minimum 1 month to 9 months</div>
                            </div><!-- .invest-field -->  

                            <div class="invest-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Loan Amount</label>
                                </div>
                                <div class="form-control-group">
                                    <div class="form-info">NGN</div>
                                    <input type="text" class="form-control form-control-amount form-control-lg" name="loan_amount" value="{{ old('loan_amount','') }}" id="loan_amount" required readonly>
                                    <div class="form-range-slider" id="loanAmount_step"></div>
                                </div>
                                <div class="form-note pt-2">Note: Minimum loan 100,000 NGN and upto 2,000,000 NGN</div>
                            </div><!-- .invest-field -->  

                            <div class="invest-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Loan Interest</label>
                                </div>
                                <div class="form-control-group">
                                    <div class="form-info">NGN</div>
                                    <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="interest" id="interest" value="{{ old('interest','') }}" required readonly>
                                </div>
                            </div><!-- .invest-field -->  

                            <div class="invest-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Total</label>
                                </div>
                                <div class="form-control-group">
                                    <div class="form-info">NGN</div>
                                    <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="total" id="total" value="{{ old('total','') }}" required readonly>
                                </div>
                            </div><!-- .invest-field --> 

                            <div class="invest-field form-group">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button href="submit" class="btn btn-lg btn-success">Apply Now</button>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
@endif


@if($pending_loan)
    <!-- @@Modal - Edit Loan @s -->
    <div class="modal fade" tabindex="-1" id="editLoan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-header">
                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                        <div class="nk-block-head-content text-center">
                            <h4 class="nk-block-title title fw-normal">Edit Loan</h4>
                            <div class="nk-block-des">
                                <p class="sub-title text-soft">This changes will become effective as long as your loan status is pending.</p>
                            </div>
                        </div>
                    </div><!-- nk-block -->
                </div>
                <div class="modal-body modal-body-md invest-block">
                    <form class="invest-form" method="post" action="#" enctype="multipart/form-data">
                        {{-- <form class="invest-form" method="post" action="{{ route("user.loan.update", [$pending_loan->id]) }}" enctype="multipart/form-data"> --}}
                        @csrf
                        <input type="hidden" name="id" value="{{ $pending_loan->id }}">
                        <input type="hidden" name="status" value="Pending">
                        <div class="row gy-gs">
                            <div class="col-12">
                                
                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Loan Duration</label>
                                    </div>
                                    <div class="form-control-group">
                                        <div class="form-info">NGN</div>
                                        <input type="text" class="form-control form-control-amount form-control-lg" name="loan_duration" value="{{ old('loan_duration', $pending_loan->loan_duration) }}" id="loan_duration" required readonly>
                                        <div class="form-range-slider" id="loanDuration_step"></div>
                                    </div>
                                    <div class="form-note pt-2">Note: Minimum 1 month to 9 months</div>
                                </div><!-- .invest-field -->  

                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Loan Amount</label>
                                    </div>
                                    <div class="form-control-group">
                                        <div class="form-info">NGN</div>
                                        <input type="text" class="form-control form-control-amount form-control-lg" name="loan_amount" value="{{ old('loan_amount', $pending_loan->loan_amount) }}" id="loan_amount" required readonly>
                                        <div class="form-range-slider" id="loanAmount_step"></div>
                                    </div>
                                    <div class="form-note pt-2">Note: Minimum loan 100,000 NGN and upto 2,000,000 NGN</div>
                                </div><!-- .invest-field -->  

                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Loan Interest</label>
                                    </div>
                                    <div class="form-control-group">
                                        <div class="form-info">NGN</div>
                                        <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="interest" id="interest" value="{{ old('interest', $pending_loan->interest) }}" required readonly>
                                    </div>
                                </div><!-- .invest-field -->  

                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Total Loan</label>
                                    </div>
                                    <div class="form-control-group">
                                        <div class="form-info">NGN</div>
                                        <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="total" id="total" value="{{ old('total', $pending_loan->total) }}" required readonly>
                                    </div>
                                </div><!-- .invest-field --> 

                                <div class="invest-field form-group">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button href="submit" class="btn btn-lg btn-success">Update Loan</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
@endif

<!-- @@Modal - Approved Loan Offer @s -->
@if ($approved_loan)
    <div class="modal fade" tabindex="-1" id="acceptLoan">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-md">
                    <h4 class="nk-modal-title title text-center">Accept this loan offer</h4>
                    <p class="text-center"><strong>Are you sure you want to Accept this loan offer?</strong></p>
                    <div class="form">
                        <ul class="d-flex justify-content-around flex-wrap g-3">
                            <li>
                                <form action="{{ route("user.loan.update", [$approved_loan->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id"              value="{{ $approved_loan->id }}">
                                    <input type="hidden" name="total"           value="{{ $approved_loan->total }}">
                                    <input type="hidden" name="status"          value="Awaiting Disbursment">
                                    <input type="hidden" name="interest"        value="{{ $approved_loan->interest }}">
                                    <input type="hidden" name="loan_amount"     value="{{ $approved_loan->loan_amount }}">
                                    <input type="hidden" name="loan_duration"   value="{{ $approved_loan->loan_duration }}">
                                    <button href="submit" class="btn btn-success">Accept Loan</button>
                                </form>
                            </li>
                            <li>
                                <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
@endif

<!-- @@Modal - Decline Loan Offer @s -->
@if($approved_loan)
    <div class="modal fade" tabindex="-1" id="declineLoan">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-md">
                    <h4 class="nk-modal-title title text-center">Decline this loan offer</h4>
                    <p class="text-center"><strong>Are you sure you want to decline this loan offer?</strong></p>
                    <div class="form">
                        <ul class="d-flex justify-content-around flex-wrap g-3">
                            <li>
                                <form action="{{ route("user.loan.update", [$approved_loan->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id"              value="{{ $approved_loan->id }}">
                                    <input type="hidden" name="total"           value="{{ $approved_loan->total }}">
                                    <input type="hidden" name="status"          value="Declined">
                                    <input type="hidden" name="interest"        value="{{ $approved_loan->interest }}">
                                    <input type="hidden" name="loan_amount"     value="{{ $approved_loan->loan_amount }}">
                                    <input type="hidden" name="loan_duration"   value="{{ $approved_loan->loan_duration }}">
                                    <button href="submit" class="btn btn-danger">Decline Loan</button>
                                </form>
                            </li>
                            <li>
                                <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
@endif

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
        var loanAmount  = document.getElementById('loan_amount');
        var loandurati  = document.getElementById('loan_duration');
        var amountStep  = document.getElementById('loanAmount_step');
        var duratiStep  = document.getElementById('loanDuration_step');
        
        noUiSlider.create(amountStep, {
            @if($pending_loan)
                start: [{{ $pending_loan->loan_amount }}],
            @endif
            start: [{{ 100000 }}],
            step: 1000,
            connect: 'lower',
            range: {
                'min': [100000],
                'max': [2000000]
            }
        });  
        noUiSlider.create(duratiStep, {
            @if($pending_loan)
                start: [{{ $pending_loan->loan_duration }}],
            @endif
            start: [{{ 3 }}],
            step: 1,
            connect: 'lower',
            range: {
                'min': [1],
                'max': [9]
            }
        });   

        amountStep.noUiSlider.on('update', function (values, handle) {
            loanAmount.value = values[handle];
            calLoan();
        });
        duratiStep.noUiSlider.on('update', function (values, handle) {
            loandurati.value = parseInt(values[handle]);
            calLoan();
        });
        
        loanAmount.addEventListener('change', function () {
            amountStep.noUiSlider.set(this.value);
        });
        loandurati.addEventListener('change', function () {
            duratiStep.noUiSlider.set(this.value);
        });

        function calLoan() {
            var intAmount = parseInt(loanAmount.value);
            var intDays = parseInt(loandurati.value);
            var intDay = 1;

            const interestrate = 72/100;

            interest = Math.abs(intAmount*(interestrate/12)*(Math.pow((1+interestrate/12),intDay))/(Math.pow((1+interestrate/12),intDay)-1));
            total = interest*intDay;
            if(intDays>1){
                diff=(total-intAmount)*(intDays-1);
            }else{
                diff=0;
            }
            total=diff+total;
            charges= total-intAmount;
            document.getElementById("interest").value = charges.toFixed(2);
            document.getElementById("total").value = total.toFixed(2);
        }    
    </script>
@endsection