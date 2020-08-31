<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> Staff
    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.staffs.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="first_name">First Name</label>
                <input class="form-control <?php echo e($errors->has('first_name') ? 'is-invalid' : ''); ?>" type="text" name="first_name" id="first_name" value="<?php echo e(old('first_name', '')); ?>" required>
                <?php if($errors->has('first_name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('first_name')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">Last Name</label>
                <input class="form-control <?php echo e($errors->has('last_name') ? 'is-invalid' : ''); ?>" type="text" name="last_name" id="last_name" value="<?php echo e(old('last_name', '')); ?>" required>
                <?php if($errors->has('last_name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('last_name')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="required" for="email"><?php echo e(trans('cruds.user.fields.email')); ?></label>
                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="required" for="password"><?php echo e(trans('cruds.user.fields.password')); ?></label>
                <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" type="password" name="password" id="password" required>
                <?php if($errors->has('password')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="required" for="role">Role</label>
                <select class="form-control <?php echo e($errors->has('role') ? 'is-invalid' : ''); ?>" name="role" id="role" required>
                    <option value disabled <?php echo e(old('role', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key != "3"): ?>
                            <option value="<?php echo e($key); ?>" <?php echo e(old('role', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('roles')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('role')); ?>

                    </div>
                <?php endif; ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sh40gnnvgawn/public_html/app/resources/views/admin/staffs/create.blade.php ENDPATH**/ ?>