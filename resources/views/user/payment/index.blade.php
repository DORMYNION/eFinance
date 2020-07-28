@extends('layouts.user')
@section('mainContent')
<div class="nk-block-head nk-block-head-lg">
    <div class="nk-block-head-sub"><span>Account Billing</span></div>
    <div class="nk-block-between-md g-4">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">Payment History</h2>
            <div class="nk-block-des">
                <p>Here is your payment history.</p>
            </div>
        </div>
        {{-- <div class="nk-block-head-content">
            <ul class="nk-block-tools gx-3">
                <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span><span class="d-none d-sm-inline-block">Get</span> Statement</span></a></li>
            </ul>
        </div> --}}
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card card-bordered">
        <table class="table table-tranx table-billing">
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
    </div>
</div><!-- .nk-block -->
@endsection