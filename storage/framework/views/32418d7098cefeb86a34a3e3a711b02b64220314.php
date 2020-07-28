<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.loan.title')); ?>

    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.loans.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($loan->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.customer')); ?>

                        </th>
                        <td>
                            <?php echo e($loan->customer->first_name ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_exist')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Loan::LOAN_EXIST_SELECT[$loan->loan_exist] ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_exist_type')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Loan::LOAN_EXIST_TYPE_SELECT[$loan->loan_exist_type] ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_exist_amount')); ?>

                        </th>
                        <td>
                            <?php echo e($loan->loan_exist_amount); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.purpose_of_loan')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Loan::PURPOSE_OF_LOAN_SELECT[$loan->purpose_of_loan] ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.repayment_option')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Loan::REPAYMENT_OPTION_SELECT[$loan->repayment_option] ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_amount')); ?>

                        </th>
                        <td>
                            <?php echo e($loan->loan_amount); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_duration')); ?>

                        </th>
                        <td>
                            <?php echo e($loan->loan_duration); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.interest')); ?>

                        </th>
                        <td>
                            <?php echo e($loan->interest); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.total')); ?>

                        </th>
                        <td>
                            <?php echo e($loan->total); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.viewed')); ?>

                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" <?php echo e($loan->viewed ? 'checked' : ''); ?>>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.status')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Loan::STATUS_SELECT[$loan->status] ?? ''); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.loans.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.relatedData')); ?>

    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#loan_loan_amounts" role="tab" data-toggle="tab">
                <?php echo e(trans('cruds.loanAmount.title')); ?>

            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="loan_loan_amounts">
            <?php if ($__env->exists('admin.loans.relationships.loanLoanAmounts', ['loanAmounts' => $loan->loanLoanAmounts])) echo $__env->make('admin.loans.relationships.loanLoanAmounts', ['loanAmounts' => $loan->loanLoanAmounts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/loans/show.blade.php ENDPATH**/ ?>