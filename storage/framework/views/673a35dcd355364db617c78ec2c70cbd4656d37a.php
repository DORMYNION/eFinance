<?php $__env->startSection('content'); ?>
<?php $__env->startSection('breadcrumb', 'All Users'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_create')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            
        </div>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.customer.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-Customer">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center"><i class="fa fa-picture-o"></i></th>
                        <th>
                            <?php echo e(trans('cruds.customer.fields.first_name')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customer.fields.last_name')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customer.fields.mobile_no_1')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customer.fields.email')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customer.fields.date_join')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $sate_join = strtotime($customer->created_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
                        ?>
                        <tr data-entry-id="<?php echo e($customer->id); ?>">
                            <td class="text-center">
                                <div class="c-avatar"><img src="<?php echo e(asset('img/profile/default.png')); ?>" alt="" class="c-avatar-img"></div>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.customers.show', $customer->id)); ?>">
                                    <?php echo e($customer->first_name ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.customers.show', $customer->id)); ?>">
                                    <?php echo e($customer->last_name ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.customers.show', $customer->id)); ?>">
                                    <?php echo e($customer->mobile_no_1 ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.customers.show', $customer->id)); ?>">
                                    <?php echo e($customer->email ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.customers.show', $customer->id)); ?>">
                                    <?php echo e($date_join ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_show')): ?>
                                    <a class="btn btn-xs btn-success" href="<?php echo e(route('admin.customers.show', $customer->id)); ?>">
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
    let table = $('.datatable-Customer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mcviqlzs/efinance/resources/views/admin/customers/index.blade.php ENDPATH**/ ?>