<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.change_password')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("profile.password.update")); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="title"><?php echo e(trans('cruds.user.fields.email')); ?></label>
                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="text" name="email" id="email" value="<?php echo e(old('email', auth()->user()->email)); ?>" required>
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="required" for="title">New <?php echo e(trans('cruds.user.fields.password')); ?></label>
                <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" type="password" name="password" id="password" required>
                <?php if($errors->has('password')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="required" for="title">Repeat New <?php echo e(trans('cruds.user.fields.password')); ?></label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mcviqlzs/efinance/resources/views/auth/passwords/edit.blade.php ENDPATH**/ ?>