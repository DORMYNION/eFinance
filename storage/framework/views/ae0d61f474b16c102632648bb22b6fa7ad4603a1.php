<?php $__env->startSection('content'); ?>

<div class="card login-card">
    <div class="row no-gutters">
        <div class="col-md-5">
            <img src="<?php echo e(asset('img/login.jpeg')); ?>" alt="login" class="login-card-img">
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <div class="brand-wrapper">
                    <img src="<?php echo e(asset('img/efinance-logo.png')); ?>" alt="logo" class="logo">
                </div>
                <p class="login-card-description">Sign into your account</p>

                <?php if(session('message')): ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" required autocomplete="email" autofocus placeholder="<?php echo e(trans('global.login_email')); ?>" value="<?php echo e(old('email', null)); ?>">
                        <?php if($errors->has('email')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('email')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required placeholder="<?php echo e(trans('global.login_password')); ?>">
                        <?php if($errors->has('password')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('password')); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="forgot-password-link pl-3" for="remember" style="vertical-align: middle;">
                                <?php echo e(trans('global.remember_me')); ?>

                            </label>
                        </div>
                    </div>
                    <button id="login" type="submit" class="btn btn-block login-btn mb-4">
                        <?php echo e(trans('global.login')); ?>

                    </button>
                    
                </form>
                <?php if(Route::has('password.request')): ?>
                    <a class="forgot-password-link" href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(trans('global.forgot_password')); ?>

                    </a><br>
                <?php endif; ?>
                <nav class="login-card-footer-nav">
                    <a href="https://www.efinanceng.com/terms.php">Terms of use.</a>
                    <a href="https://efinanceng.com/privacy.php">Privacy policy</a>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/app/resources/views/auth/login.blade.php ENDPATH**/ ?>