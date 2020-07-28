<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.loanAmount.title')); ?>

    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.loan-amounts.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.loan')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->loan->viewed ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.sub_total')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->sub_total); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.interest')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->interest); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.total')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->total); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.paid')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->paid); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.balance')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->balance); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.loan_date')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->loan_date); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loanAmount.fields.due_date')); ?>

                        </th>
                        <td>
                            <?php echo e($loanAmount->due_date); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.loan-amounts.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/loanAmounts/show.blade.php ENDPATH**/ ?>