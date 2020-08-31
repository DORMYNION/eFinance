<?php $__env->startSection('content'); ?>
<?php $__env->startSection('breadcrumb', 'Dashboard'); ?>
<div class="content">

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card text-white bg-gradient-info">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings1['total_number'] - $isAdmin )); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold h5"><?php echo e($settings1['chart_title']); ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card text-white bg-gradient-success">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings2['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold h5"><?php echo e($settings2['chart_title']); ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card text-white bg-gradient-warning">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings3['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold h5">Total Loans Out</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings4['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold h5">Total Paybacks In</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold h5">Latest loan applications</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-hover table-outline mb-0 datatable datatable-Dashboard">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"><i class="fa fa-picture-o"></i></th>
                                <th><?php echo e(trans('cruds.loan.fields.date_apply')); ?></th>
                                <th><?php echo e(trans('cruds.customer.fields.full_name')); ?></th>
                                <th><?php echo e(trans('cruds.customer.fields.mobile_no_1')); ?></th>
                                <th><?php echo e(trans('cruds.customer.fields.email')); ?></th>
                                <th><?php echo e(trans('cruds.loan.fields.loan_amount')); ?></th>
                                <th><?php echo e(trans('cruds.loan.fields.status')); ?></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $sate_join = strtotime($loan->created_at);
                                    $date_join = date('D, F d Y H:ia', $sate_join);
                                ?>
                                <tr  data-entry-id="<?php echo e($loan->id); ?>">
                                    <td class="text-center">
                                        <div class="c-avatar">
                                            <?php if($loan->user->profile_image): ?>
                                                <img class="c-avatar-img no-border" src="<?php echo e($loan->user->profile_image->getUrl()); ?>"  alt="">
                                            <?php else: ?>
                                                <img class="c-avatar-img no-border" src="<?php echo e(asset('img/profile/default.jpeg')); ?>" alt="">
                                            <?php endif; ?>    
                                        </div>
                                    </td>
                                    <td><?php echo e($date_join); ?></td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.users.show', $loan->user->id)); ?>">
                                            <?php echo e($loan->user->first_name ?? ''); ?> <?php echo e($loan->user->last_name ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.users.show', $loan->user->id)); ?>">
                                            <?php echo e($loan->user->mobile_no_1 ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.users.show', $loan->user->id)); ?>">
                                            <?php echo e($loan->user->email ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.users.show', $loan->user->id)); ?>">
                                            <?php echo e(number_format($loan->loan_amount, 2) ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.users.show', $loan->user->id)); ?>">
                                            <?php echo e(App\Loan::STATUS_SELECT[$loan->status] ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-success" href="<?php echo e(route('admin.users.show', $loan->user->id)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 1, 'desc' ]],
        pageLength: 50,
    });
    let table = $('.datatable-Dashboard:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    
    })

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mcviqlzs/efinance/resources/views/home.blade.php ENDPATH**/ ?>