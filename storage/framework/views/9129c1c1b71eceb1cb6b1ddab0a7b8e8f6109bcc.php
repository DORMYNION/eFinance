<?php $__env->startSection('mainContent'); ?>
<div class="nk-block-head nk-block-head-lg">
    <div class="nk-block-head-sub"><span>Account Billing</span></div>
    <div class="nk-block-between-md g-4">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title fw-normal">Payment History</h2>
            <div class="nk-block-des">
                <p>Here is your payment history.</p>
            </div>
        </div>
        
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/user/payment/index.blade.php ENDPATH**/ ?>