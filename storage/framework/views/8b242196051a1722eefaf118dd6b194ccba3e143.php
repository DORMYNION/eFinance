<?php $__env->startSection('content'); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route('admin.staffs.create')); ?>">
                Add Staff
            </a>
        </div>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        Staff List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-user">
                <thead class="thead-light">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th> 
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $sate_join = strtotime($user->created_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
                        ?>
                        <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td>
                                <?php echo e($user->first_name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($user->last_name ?? ''); ?>

                            </td> 
                            <td>
                                <?php echo e($user->email ?? ''); ?>

                            </td> 
                            <td>
                                <a class="btn btn-xs btn-success" href="<?php echo e(route('admin.staffs.edit', $user->id)); ?>">
                                    Change Password
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
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mcviqlzs/efinance/resources/views/admin/staffs/index.blade.php ENDPATH**/ ?>