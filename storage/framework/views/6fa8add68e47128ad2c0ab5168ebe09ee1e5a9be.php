<?php $__env->startSection('content'); ?>
<?php $__env->startSection('breadcrumb', 'Approved Loans'); ?>
<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.loanAmount.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-LoanAmount">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center"><i class="fa fa-picture-o"></i></th>
                        <th>Date Approved</th>
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
                            $sate_join = strtotime($loan->updated_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
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
                                    <?php echo e($loan->loan_amount ?? ''); ?>

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
    let table = $('.datatable-LoanAmount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/app/resources/views/admin/loans/index.blade.php ENDPATH**/ ?>