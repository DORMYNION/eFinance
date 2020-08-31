<?php $__env->startSection('mainContent'); ?>

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

    <?php if($current_loan): ?>
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title"><a href=""><span>NGN</span><?php echo e(number_format($current_loan->loan_amount, 2)); ?> <span class="badge badge-primary badge-pill"><?php echo e($current_loan->status); ?></span></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> <?php echo e($current_loan->created_at->format('M d, Y')); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> <?php echo e($current_loan->loan_duration); ?> Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> <?php echo e(number_format($current_loan->interest, 2)); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> <?php echo e(number_format($current_loan->total, 2)); ?></p>
                                </li>
                            </ul>
                        </div><!-- .sp-plan-desc -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="sp-plan-action card-inner">
                            <div class="sp-plan-note text-md-center">
                                
                                <p>Balance: <span>NGN <?php echo e(number_format($current_loan->loanAmounts[0]->balance, 2)); ?></span></p>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .sp-plan -->
        </div><!-- .nk-block -->
    <?php elseif($awaiting_loan): ?>
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title"><a href=""><span>NGN</span><?php echo e(number_format($awaiting_loan->loan_amount, 2)); ?> <span class="badge badge-info badge-pill"><?php echo e($awaiting_loan->status); ?></span></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> <?php echo e($awaiting_loan->created_at->format('M d, Y')); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> <?php echo e($awaiting_loan->loan_duration); ?> Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> <?php echo e(number_format($awaiting_loan->interest, 2)); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> <?php echo e(number_format($awaiting_loan->total, 2)); ?></p>
                                </li>
                            </ul>
                        </div><!-- .sp-plan-desc -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="sp-plan-action card-inner">
                            <div class="sp-plan-btn">
                                
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
    <?php elseif($approved_loan): ?>
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title"><a href=""><span>NGN</span><?php echo e(number_format($approved_loan->loan_amount, 2)); ?> <span class="badge badge-secondary badge-pill"><?php echo e($approved_loan->status); ?></span></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> <?php echo e($approved_loan->created_at->format('M d, Y')); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> <?php echo e($approved_loan->loan_duration); ?> Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> <?php echo e(number_format($approved_loan->interest, 2)); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> <?php echo e(number_format($approved_loan->total, 2)); ?></p>
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
    <?php elseif($pending_loan): ?>
        <div class="nk-block">
            <div class="card card-bordered sp-plan">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="sp-plan-info card-inner">
                            <div class="row gx-0 gy-3">
                                <div class="col-xl-9 col-sm-8">
                                    <div class="sp-plan-name">
                                        <h4 class="title text-primary"><span>NGN</span><?php echo e(number_format($pending_loan->loan_amount, 2)); ?> <span class="badge badge-danger badge-pill"><?php echo e($pending_loan->status); ?></span></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .sp-plan-info -->
                        <div class="sp-plan-desc card-inner">
                            <ul class="row gx-1">
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Requested On</span> <?php echo e($pending_loan->created_at->format('M d, Y')); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Duration</span> <?php echo e($pending_loan->loan_duration); ?> Month(s)</p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Loan Interest</span> <?php echo e(number_format($pending_loan->interest, 2)); ?></p>
                                </li>
                                <li class="col-6 col-lg-3">
                                    <p><span class="text-soft">Total Amount</span> <?php echo e(number_format($pending_loan->total, 2)); ?></p>
                                </li>
                            </ul>
                        </div><!-- .sp-plan-desc -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="sp-plan-action card-inner">
                            <div class="sp-plan-btn">
                                
                            </div>
                            <div class="sp-plan-btn">
                            </div>
                            <div class="sp-plan-note text-md-center">
                                <p> <span>Loan not approved yet</span></p>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .sp-plan -->
        </div><!-- .nk-block -->
    <?php else: ?>
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
    <?php endif; ?>


<!-- Loan Schedule and Payment --> 
<?php if($current_loan !== null && $current_loan->status !== 'Fully Paid'): ?>
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
                            <?php $__currentLoopData = $current_loan->loanRepayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $loanRepayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="row gx-1">
                                <li class="col-sm-4">
                                    <p><span class="text-soft">Due on</span> <?php echo e(Carbon\Carbon::parse($loanRepayment->due_date)->format('F d, Y')); ?></p>
                                </li>
                                <li class="col-sm-4">
                                    <p><span class="text-soft">Price</span>NGN <?php echo e(number_format($loanRepayment->amount, 2)); ?> </p>
                                </li>
                                <li class="col-sm-4">
                                    <p>
                                        <span class="text-soft">Status</span> 
                                        <?php if($loanRepayment->status === 'Overdue'): ?>
                                            <span class="badge badge-danger badge-pill" style="display: inline-block;"><?php echo e($loanRepayment->status); ?></span>
                                        <?php else: ?>
                                            <?php echo e($loanRepayment->status); ?>

                                        <?php endif; ?> 
                                    </p>
                                </li>
                            </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php for($i = 0; $i < $current_loan->loan_duration; $i++): ?>
                            <?php endfor; ?>
                        </div>
                    </div><!-- .card-inner -->
                    
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .col -->
        <?php if(isset($next_payment)): ?>
            <div class="col-xl-4">
                <div class="card card-bordered card-full d-none d-xl-block">
                    
                        <div class="card-inner-group">
                            <div class="card-inner">
                                    <div class="sp-plan-head">
                                        <h6 class="title">Next Payment</h6>
                                    </div>
                                    <div class="sp-plan-desc sp-plan-desc-mb">
                                        <ul class="row gx-1">
                                            <li class="col-sm-6">
                                                <?php
                                                    // dd($next_payment);
                                                ?>
                                                
                                            </li>
                                            <li class="col-sm-6 sp-plan-amount pt-3">
                                                <span class="amount"><?php echo e(number_format($next_payment->amount, 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                    <div class="sp-plan-head">
                                        <h6 class="title">Last Payment</h6>
                                    </div>
                                    <div class="sp-plan-desc sp-plan-desc-mb">
                                        <?php if(isset($last_payment)): ?>
                                            <ul class="row gx-1">
                                                <li class="col-sm-6">
                                                    <span class="ff-italic text-soft">Paid at <br><?php echo e($last_payment->created_at->format('F d, Y')); ?></span>
                                                </li>
                                                <li class="col-sm-6 sp-plan-amount">
                                                    <span class="amount">NGN <br><?php echo e(number_format($last_payment->amount, 2)); ?></span>
                                                </li>
                                            </ul>
                                        <?php else: ?>
                                            <p>No payment made yet.</p>                                                                            
                                        <?php endif; ?>
                                    </div>
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div>
                 
            </div><!-- .col -->
        <?php endif; ?>
    </div>
</div><!-- .nk-block --> 
<?php endif; ?>

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
                        <?php $__currentLoopData = $user->userLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userLoan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub"><?php echo e($userLoan->created_at->format('F d, Y')); ?></span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub"><?php echo e($userLoan->loan_duration); ?> Month(s)</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount"><span>NGN </span><?php echo e(number_format($userLoan->loan_amount, 2)); ?></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount"><span>NGN </span><?php echo e(number_format($userLoan->interest, 2)); ?></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount"><span>NGN </span><?php echo e(number_format($userLoan->total, 2)); ?></span>
                                </div>
                                <div class="nk-tb-col">
                                    <?php if($userLoan->status === 'Due'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-dark"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Expired'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-black"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Pending'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-danger"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Declined'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-warning"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Approved'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-seccondary"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Disbursed'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-primary"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Fully Paid'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-success"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Partially Paid'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-gray"><?php echo e($userLoan->status); ?></span>
                                    <?php elseif($userLoan->status === 'Awaiting Disbursment'): ?>
                                        <span class="badge badge-dot badge-dot-xs badge-info"><?php echo e($userLoan->status); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                    </div>
                </div>
                <div class="card-inner-sm border-top text-center d-sm-none">
                    <a href="#" class="btn btn-link btn-block">See History</a>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
    </div><!-- .row -->
</div>

<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Payment History</h6>
                </div>
            </div>
        </div>
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
                <?php $__currentLoopData = $user->userPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                            <span><?php echo e($payment->reference); ?></span>
                        </td>
                        <td class="tb-tnx-info">
                            <div class="tb-tnx-desc">
                                <span class="title"><?php echo e($payment->payment_method); ?></span>
                            </div>
                            <div class="tb-tnx-date">
                                <span class="date"><?php echo e($payment->paid_at); ?></span>
                            </div>
                        </td>
                        <td class="tb-tnx-amount">
                            <div class="tb-tnx-total">
                                <span class="amount">NGN <?php echo e($payment->amount); ?></span>
                            </div>
                            <div class="tb-tnx-status">
                                <span class="badge badge-dot badge-success"><?php echo e($payment->status); ?></span>
                            </div>
                        </td>
                    </tr><!-- .tb-tnx-item -->
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div><!-- .nk-block -->


<!-- @Modal - Apply Now @s  -->
<?php if(!$pending_loan): ?>
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
                <form class="invest-form" method="post" action="<?php echo e(route("user.loan.store")); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="status" value="Pending">
                    <div class="row gy-gs">
                        <div class="col-12">
                            <div class="invest-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Purpose of Loan</label>
                                </div>
                                <div class="form-control-group">
                                    <div class="form-info"><em class="icon ni ni-arrow-down">&nbsp;&nbsp;</em></div>
                                    <select class="form-control form-control-amount custom-select <?php echo e($errors->has('purpose_of_loan') ? 'is-invalid' : ''); ?>" name="purpose_of_loan" id="purpose_of_loan" required>
                                        <option value disabled <?php echo e(old('purpose_of_loan', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                                        <?php $__currentLoopData = App\Loan::PURPOSE_OF_LOAN_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e(old('purpose_of_loan', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <input type="text" class="form-control form-control-amount form-control-lg" name="loan_duration" value="<?php echo e(old('loan_duration','')); ?>" id="loan_duration" required readonly>
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
                                    <input type="text" class="form-control form-control-amount form-control-lg" name="loan_amount" value="<?php echo e(old('loan_amount','')); ?>" id="loan_amount" required readonly>
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
                                    <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="interest" id="interest" value="<?php echo e(old('interest','')); ?>" required readonly>
                                </div>
                            </div><!-- .invest-field -->  

                            <div class="invest-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Total</label>
                                </div>
                                <div class="form-control-group">
                                    <div class="form-info">NGN</div>
                                    <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="total" id="total" value="<?php echo e(old('total','')); ?>" required readonly>
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
<?php endif; ?>


<!-- @Modal - Edit Loan @s  -->
<?php if($pending_loan): ?>
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
                        
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($pending_loan->id); ?>">
                        <input type="hidden" name="status" value="Pending">
                        <div class="row gy-gs">
                            <div class="col-12">
                                
                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Loan Duration</label>
                                    </div>
                                    <div class="form-control-group">
                                        <div class="form-info">NGN</div>
                                        <input type="text" class="form-control form-control-amount form-control-lg" name="loan_duration" value="<?php echo e(old('loan_duration', $pending_loan->loan_duration)); ?>" id="loan_duration" required readonly>
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
                                        <input type="text" class="form-control form-control-amount form-control-lg" name="loan_amount" value="<?php echo e(old('loan_amount', $pending_loan->loan_amount)); ?>" id="loan_amount" required readonly>
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
                                        <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="interest" id="interest" value="<?php echo e(old('interest', $pending_loan->interest)); ?>" required readonly>
                                    </div>
                                </div><!-- .invest-field -->  

                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Total Loan</label>
                                    </div>
                                    <div class="form-control-group">
                                        <div class="form-info">NGN</div>
                                        <input type="text" class="form-control form-control-amount form-control-lg" type="number" name="total" id="total" value="<?php echo e(old('total', $pending_loan->total)); ?>" required readonly>
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
<?php endif; ?>

<!-- @Modal - Approved Loan Offer @s  -->
<?php if($approved_loan): ?>
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
                                <form action="<?php echo e(route("user.loan.update", [$approved_loan->id])); ?>" method="POST" id="formAprove">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id"              value="<?php echo e($approved_loan->id); ?>">
                                    <input type="hidden" name="total"           value="<?php echo e($approved_loan->total); ?>">
                                    <input type="hidden" name="status"          value="Awaiting Disbursment">
                                    <input type="hidden" name="interest"        value="<?php echo e($approved_loan->interest); ?>">
                                    <input type="hidden" name="loan_amount"     value="<?php echo e($approved_loan->loan_amount); ?>">
                                    <input type="hidden" name="loan_duration"   value="<?php echo e($approved_loan->loan_duration); ?>">
                                    <button type="submit" class="btn btn-success" >Accept Loan</button>
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
<?php endif; ?>

<!-- @Modal - Decline Loan Offer @s  -->
<?php if($approved_loan): ?>
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
                                <form action="<?php echo e(route("user.loan.update", [$approved_loan->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id"              value="<?php echo e($approved_loan->id); ?>">
                                    <input type="hidden" name="total"           value="<?php echo e($approved_loan->total); ?>">
                                    <input type="hidden" name="status"          value="Declined">
                                    <input type="hidden" name="interest"        value="<?php echo e($approved_loan->interest); ?>">
                                    <input type="hidden" name="loan_amount"     value="<?php echo e($approved_loan->loan_amount); ?>">
                                    <input type="hidden" name="loan_duration"   value="<?php echo e($approved_loan->loan_duration); ?>">
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
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var loanAmount  = document.getElementById('loan_amount');
        var loandurati  = document.getElementById('loan_duration');
        var amountStep  = document.getElementById('loanAmount_step');
        var duratiStep  = document.getElementById('loanDuration_step');
        
        noUiSlider.create(amountStep, {
            <?php if($pending_loan): ?>
                start: [<?php echo e($pending_loan->loan_amount); ?>],
            <?php endif; ?>
            start: [<?php echo e(100000); ?>],
            step: 1000,
            connect: 'lower',
            range: {
                'min': [100000],
                'max': [2000000]
            }
        });  
        noUiSlider.create(duratiStep, {
            <?php if($pending_loan): ?>
                start: [<?php echo e($pending_loan->loan_duration); ?>],
            <?php endif; ?>
            start: [<?php echo e(3); ?>],
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
    <script>

        var a = document.getElementById('customAmount')
        a.addEventListener('keyup', function() {
        var b = a.value*100;
            document.getElementById('camount').value = b;
        }); 
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sh40gnnvgawn/public_html/app/resources/views/user/loan/index.blade.php ENDPATH**/ ?>