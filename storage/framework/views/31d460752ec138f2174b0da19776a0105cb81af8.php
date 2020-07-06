<?php $__env->startSection('content'); ?>
<?php $__env->startSection('breadcrumb', 'Dashboard'); ?>
<div class="content">

    <div class="row">
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-info">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings1['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold"><?php echo e($settings1['chart_title']); ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-success">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings2['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold"><?php echo e($settings2['chart_title']); ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-warning">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings3['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold"><?php echo e($settings3['chart_title']); ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings4['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold"><?php echo e($settings4['chart_title']); ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-danger">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings5['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold"><?php echo e($settings5['chart_title']); ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-info">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1><?php echo e(number_format($settings6['total_number'])); ?></h1></div>
                    <small class="text-muted text-uppercase font-weight-bold"><?php echo e($settings6['chart_title']); ?></small>
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
                                    $date_join = date('F d, Y H:i:sa', $sate_join);
                                ?>
                                <tr  data-entry-id="<?php echo e($loan->id); ?>">
                                    <td class="text-center">
                                        <div class="c-avatar"><img src="<?php echo e(asset('img/profile/default.png')); ?>" alt="" class="c-avatar-img"></div>
                                    </td>
                                    <td><?php echo e($date_join); ?></td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.customers.show', $loan->customer->id)); ?>">
                                            <?php echo e($loan->customer->first_name ?? ''); ?> <?php echo e($loan->customer->last_name ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.customers.show', $loan->customer->id)); ?>">
                                            <?php echo e($loan->customer->mobile_no_1 ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.customers.show', $loan->customer->id)); ?>">
                                            <?php echo e($loan->customer->email ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.customers.show', $loan->customer->id)); ?>">
                                            <?php echo e($loan->loan_amount ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="<?php echo e(route('admin.customers.show', $loan->customer->id)); ?>">
                                            <?php echo e(App\Loan::STATUS_SELECT[$loan->status] ?? ''); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan_show')): ?>
                                            <a class="btn btn-xs btn-success" href="<?php echo e(route('admin.customers.show', $loan->customer->id)); ?>">
                                                <?php echo e(trans('global.view')); ?>

                                            </a>
                                        <?php endif; ?>  
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/home.blade.php ENDPATH**/ ?>