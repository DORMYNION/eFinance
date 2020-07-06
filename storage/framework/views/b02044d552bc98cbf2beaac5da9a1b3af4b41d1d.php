<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.loan.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.loans.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="customer_id"><?php echo e(trans('cruds.loan.fields.customer')); ?></label>
                <select class="form-control select2 <?php echo e($errors->has('customer') ? 'is-invalid' : ''); ?>" name="customer_id" id="customer_id" required>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e(old('customer_id') == $id ? 'selected' : ''); ?>><?php echo e($customer); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('customer')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('customer')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.customer_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.loan.fields.loan_exist')); ?></label>
                <select class="form-control <?php echo e($errors->has('loan_exist') ? 'is-invalid' : ''); ?>" name="loan_exist" id="loan_exist" required>
                    <option value disabled <?php echo e(old('loan_exist', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Loan::LOAN_EXIST_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('loan_exist', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('loan_exist')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('loan_exist')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.loan_exist_helper')); ?></span>
            </div>
            <div class="form-group">
                <label><?php echo e(trans('cruds.loan.fields.loan_exist_type')); ?></label>
                <select class="form-control <?php echo e($errors->has('loan_exist_type') ? 'is-invalid' : ''); ?>" name="loan_exist_type" id="loan_exist_type">
                    <option value disabled <?php echo e(old('loan_exist_type', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Loan::LOAN_EXIST_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('loan_exist_type', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('loan_exist_type')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('loan_exist_type')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.loan_exist_type_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="loan_exist_amount"><?php echo e(trans('cruds.loan.fields.loan_exist_amount')); ?></label>
                <input class="form-control <?php echo e($errors->has('loan_exist_amount') ? 'is-invalid' : ''); ?>" type="number" name="loan_exist_amount" id="loan_exist_amount" value="<?php echo e(old('loan_exist_amount', '')); ?>" step="0.01">
                <?php if($errors->has('loan_exist_amount')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('loan_exist_amount')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.loan_exist_amount_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.loan.fields.purpose_of_loan')); ?></label>
                <select class="form-control <?php echo e($errors->has('purpose_of_loan') ? 'is-invalid' : ''); ?>" name="purpose_of_loan" id="purpose_of_loan" required>
                    <option value disabled <?php echo e(old('purpose_of_loan', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Loan::PURPOSE_OF_LOAN_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('purpose_of_loan', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('purpose_of_loan')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('purpose_of_loan')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.purpose_of_loan_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.loan.fields.repayment_option')); ?></label>
                <select class="form-control <?php echo e($errors->has('repayment_option') ? 'is-invalid' : ''); ?>" name="repayment_option" id="repayment_option" required>
                    <option value disabled <?php echo e(old('repayment_option', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Loan::REPAYMENT_OPTION_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('repayment_option', 'Monthly') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('repayment_option')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('repayment_option')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.repayment_option_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="loan_amount"><?php echo e(trans('cruds.loan.fields.loan_amount')); ?></label>
                <input class="form-control <?php echo e($errors->has('loan_amount') ? 'is-invalid' : ''); ?>" type="number" name="loan_amount" id="loan_amount" value="<?php echo e(old('loan_amount', '')); ?>" step="0.01" required>
                <?php if($errors->has('loan_amount')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('loan_amount')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.loan_amount_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="loan_duration"><?php echo e(trans('cruds.loan.fields.loan_duration')); ?></label>
                <input class="form-control <?php echo e($errors->has('loan_duration') ? 'is-invalid' : ''); ?>" type="number" name="loan_duration" id="loan_duration" value="<?php echo e(old('loan_duration', '')); ?>" step="1" required>
                <?php if($errors->has('loan_duration')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('loan_duration')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.loan_duration_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="interest"><?php echo e(trans('cruds.loan.fields.interest')); ?></label>
                <input class="form-control <?php echo e($errors->has('interest') ? 'is-invalid' : ''); ?>" type="number" name="interest" id="interest" value="<?php echo e(old('interest', '')); ?>" step="0.01" required>
                <?php if($errors->has('interest')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('interest')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.interest_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="total"><?php echo e(trans('cruds.loan.fields.total')); ?></label>
                <input class="form-control <?php echo e($errors->has('total') ? 'is-invalid' : ''); ?>" type="number" name="total" id="total" value="<?php echo e(old('total', '')); ?>" step="0.01" required>
                <?php if($errors->has('total')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('total')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loan.fields.total_helper')); ?></span>
            </div>
            <div class="form-group">
                <select name="status" id="status" required hidden>
                    <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Loan::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('status', 'Pending') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <select name="customer_type" id="customer_type" required hidden>
                    <option value disabled <?php echo e(old('customer_type', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Loan::CUSTOMER_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('customer_type', 'Old') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/loans/create.blade.php ENDPATH**/ ?>