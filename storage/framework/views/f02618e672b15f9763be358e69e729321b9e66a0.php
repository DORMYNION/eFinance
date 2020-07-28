<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none justify-content-start">
        <a class="c-sidebar-brand-full h4" href="route('admin.home')" style="padding-left: 2.05rem">
            <?php echo e(trans('panel.site_title')); ?>

        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="<?php echo e(route("admin.home")); ?>" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                <?php echo e(trans('global.dashboard')); ?>

            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="<?php echo e(route("admin.loans.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is('admin/loan-amounts') || request()->is('admin/loan-amounts/*') ? 'active' : ''); ?>">
                <i class="fa-fw fas fa-file-invoice-dollar c-sidebar-nav-icon">

                </i>
                <?php echo e(trans('cruds.loanAmount.title')); ?>

            </a>
        </li>        
        <li class="c-sidebar-nav-item">
            <a href="<?php echo e(route("admin.payments.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is('admin/payments') || request()->is('admin/payments/*') ? 'active' : ''); ?>">
                <i class="fa-fw fas fa-credit-card c-sidebar-nav-icon">

                </i>
                <?php echo e(trans('cruds.payment.title')); ?>

            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="<?php echo e(route("admin.users.index")); ?>" class="c-sidebar-nav-link <?php echo e(request()->is('admin/customers') || request()->is('admin/customers/*') ? 'active' : ''); ?>">
                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                </i>
                All Users
            </a>
        </li>
        <?php if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))): ?>
           <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link <?php echo e(request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : ''); ?>" href="<?php echo e(route('profile.password.edit')); ?>">
                    <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                    </i>
                    <?php echo e(trans('global.change_password')); ?>

                </a>
            </li>            
        <?php endif; ?>
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                <?php echo e(trans('global.logout')); ?>

            </a>
        </li>
    </ul>

</div><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/partials/menu.blade.php ENDPATH**/ ?>