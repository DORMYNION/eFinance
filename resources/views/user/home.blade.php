@extends('layouts.user')
@section('mainContent')
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">Welcome, {{ $user->name }}</h2>
                <div class="nk-block-des">
                    <p>Welcome to your dashboard. Manage your account and your Loans.</p>
                </div>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-md-6">
                <div class="card card-bordered card-full">
                    <div class="nk-wg1">
                        <div class="nk-wg1-block">
                            <div class="nk-wg1-img">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                    <rect x="5" y="7" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="25" y="27" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="15" y="17" width="60" height="56" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="15" y1="29" x2="75" y2="29" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                    <circle cx="53" cy="23" r="2" fill="#c4cefe" />
                                    <circle cx="60" cy="23" r="2" fill="#c4cefe" />
                                    <circle cx="67" cy="23" r="2" fill="#c4cefe" />
                                    <rect x="22" y="39" width="20" height="20" rx="2" ry="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="40" x2="69" y2="40" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="51" x2="69" y2="51" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="57" x2="59" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="64" y1="57" x2="66" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="46" x2="59" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="64" y1="46" x2="66" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
                            </div>
                            <div class="nk-wg1-text">
                                <h5 class="title">Personal Info</h5>
                                <p>See your personal information and manage or update your profile.</p>
                            </div>
                        </div>
                        <div class="nk-wg1-action">
                            <a href="{{ route('user.profile') }}" class="link"><span>Manage Your Account</span> <em class="icon ni ni-chevron-right"></em></a>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-md-6">
                <div class="card card-bordered card-full">
                    <div class="nk-wg1">
                        <div class="nk-wg1-block">
                            <div class="nk-wg1-img">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                    <path d="M68.14,80.86,30.21,72.69a5.93,5.93,0,0,1-4.57-7l12.26-56A6,6,0,0,1,45,5.14l28.18,6.07L85.5,29.51,75.24,76.33A6,6,0,0,1,68.14,80.86Z" fill="#eff1ff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="73 12.18 69.83 26.66 85.37 30.08" fill="#eff1ff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M66.26,71.15,29.05,82.46a6,6,0,0,1-7.46-4L4.76,23.15a6,6,0,0,1,4-7.47l27.64-8.4L56.16,17.39,70.24,63.68A6,6,0,0,1,66.26,71.15Z" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="36.7 8.22 41.05 22.53 56.33 17.96" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M68,85H29a6,6,0,0,1-6-6V21a6,6,0,0,1,6-6H58L74,30.47V79A6,6,0,0,1,68,85Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="58 16 58 31 74 31.07" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="45" y1="41" x2="61" y2="41" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="48" x2="61" y2="48" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="55" x2="61" y2="55" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="63" x2="61" y2="63" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="69" x2="51" y2="69" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /><text transform="translate(34.54 43.18) scale(0.99 1)" font-size="9.31" fill="#6576ff" font-family="Nunito-Black, Nunito Black">$</text></svg>
                            </div>
                            <div class="nk-wg1-text">
                                <h5 class="title">My Loans</h5>
                                <p>Check out your current or past loans or apply for a new loan.</p>
                            </div>
                        </div>
                        <div class="nk-wg1-action">
                            <a href="{{ route('user.loan') }}" class="link"><span>My Loans</span> <em class="icon ni ni-chevron-right"></em></a>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner card-inner-md">
                <div class="card-title-group">
                    <h6 class="card-title">Payment History</h6>
                    <div class="card-action">
                        <a href="{{ route('user.payment') }}" class="link link-sm">See All <em class="icon ni ni-chevron-right"></em></a>
                    </div>
                </div>
            </div>
            <table class="table table-tranx">
                <thead>
                    <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">Reference No</span></th>
                        <th class="tb-tnx-info">
                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                <span>Payment Method</span>
                            </span>
                            <span class="tb-tnx-date d-md-inline-block d-none">
                                    <span>Payment Date</span>
                            </span>
                        </th>
                        <th class="tb-tnx-amount">
                            <span class="tb-tnx-total">Amount Paid</span>
                            <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                        </th>
                    </tr><!-- .tb-tnx-head -->
                </thead>
                <tbody>
                    @foreach ($user->userPayments as $payment)
                        <tr class="tb-tnx-item">
                            <td class="tb-tnx-id">
                                <span>{{ $payment->reference }}</span>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    <span class="title">{{ $payment->payment_method }}</span>
                                </div>
                                <div class="tb-tnx-date">
                                    <span class="date">{{ $payment->paid_at }}</span>
                                </div>
                            </td>
                            <td class="tb-tnx-amount">
                                <div class="tb-tnx-total">
                                    <span class="amount">NGN {{ $payment->amount }}</span>
                                </div>
                                <div class="tb-tnx-status">
                                    <span class="badge badge-dot badge-success">{{ $payment->status }}</span>
                                </div>
                            </td>
                        </tr><!-- .tb-tnx-item -->
                        
                    @endforeach
                </tbody>
            </table>
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection