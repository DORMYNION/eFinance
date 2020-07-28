<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.loanAmount.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.loan-amounts.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="loan_id"><?php echo e(trans('cruds.loanAmount.fields.loan')); ?></label>
                <select class="form-control select2 <?php echo e($errors->has('loan') ? 'is-invalid' : ''); ?>" name="loan_id" id="loan_id" required>
                    <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e(old('loan_id') == $id ? 'selected' : ''); ?>><?php echo e($loan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('loan')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('loan')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.loan_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_total"><?php echo e(trans('cruds.loanAmount.fields.sub_total')); ?></label>
                <input class="form-control <?php echo e($errors->has('sub_total') ? 'is-invalid' : ''); ?>" type="number" name="sub_total" id="sub_total" value="<?php echo e(old('sub_total', '')); ?>" step="0.01" required>
                <?php if($errors->has('sub_total')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('sub_total')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.sub_total_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="interest"><?php echo e(trans('cruds.loanAmount.fields.interest')); ?></label>
                <input class="form-control <?php echo e($errors->has('interest') ? 'is-invalid' : ''); ?>" type="number" name="interest" id="interest" value="<?php echo e(old('interest', '')); ?>" step="0.01" required>
                <?php if($errors->has('interest')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('interest')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.interest_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="total"><?php echo e(trans('cruds.loanAmount.fields.total')); ?></label>
                <input class="form-control <?php echo e($errors->has('total') ? 'is-invalid' : ''); ?>" type="number" name="total" id="total" value="<?php echo e(old('total', '')); ?>" step="0.01" required>
                <?php if($errors->has('total')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('total')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.total_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="paid"><?php echo e(trans('cruds.loanAmount.fields.paid')); ?></label>
                <input class="form-control <?php echo e($errors->has('paid') ? 'is-invalid' : ''); ?>" type="number" name="paid" id="paid" value="<?php echo e(old('paid', '')); ?>" step="0.01">
                <?php if($errors->has('paid')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('paid')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.paid_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="balance"><?php echo e(trans('cruds.loanAmount.fields.balance')); ?></label>
                <input class="form-control <?php echo e($errors->has('balance') ? 'is-invalid' : ''); ?>" type="number" name="balance" id="balance" value="<?php echo e(old('balance', '')); ?>" step="0.01">
                <?php if($errors->has('balance')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('balance')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.balance_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="loan_date"><?php echo e(trans('cruds.loanAmount.fields.loan_date')); ?></label>
                <input class="form-control date <?php echo e($errors->has('loan_date') ? 'is-invalid' : ''); ?>" type="text" name="loan_date" id="loan_date" value="<?php echo e(old('loan_date')); ?>" required>
                <?php if($errors->has('loan_date')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('loan_date')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.loan_date_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="due_date"><?php echo e(trans('cruds.loanAmount.fields.due_date')); ?></label>
                <input class="form-control date <?php echo e($errors->has('due_date') ? 'is-invalid' : ''); ?>" type="text" name="due_date" id="due_date" value="<?php echo e(old('due_date')); ?>">
                <?php if($errors->has('due_date')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('due_date')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.loanAmount.fields.due_date_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/loanAmounts/create.blade.php ENDPATH**/ ?>