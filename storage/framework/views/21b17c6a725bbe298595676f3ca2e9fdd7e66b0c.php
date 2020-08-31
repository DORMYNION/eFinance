<?php $__env->startSection('content'); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route('admin.users.create')); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.user.title_singular')); ?>

            </a>
        </div>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.user.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-User">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center"><i class="fa fa-picture-o"></i></th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Date Join</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $sate_join = strtotime($user->created_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
                        ?>
                        <tr data-entry-id="<?php echo e($user->id); ?>">
                            <td class="text-center">
                                <div class="c-avatar">
                                    <?php if($user->profile_image): ?>
                                        <a href="<?php echo e($user->profile_image->getUrl()); ?>" target="_blank">
                                            <img class="img-fluid no-border" src="<?php echo e($user->profile_image->getUrl('thumb')); ?>"  alt="<?php echo e($user->name); ?> Profile Image">
                                        </a>
                                    <?php else: ?>
                                        <img class="img-fluid no-border" src="<?php echo e(asset('img/profile/default.jpeg')); ?>" alt="<?php echo e($user->name); ?> Profile Image">
                                    <?php endif; ?>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.users.show', $user->id)); ?>">
                                    <?php echo e($user->first_name ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.users.show', $user->id)); ?>">
                                    <?php echo e($user->last_name ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.users.show', $user->id)); ?>">
                                    <?php echo e($user->mobile_no_1 ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.users.show', $user->id)); ?>">
                                    <?php echo e($user->email ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="<?php echo e(route('admin.users.show', $user->id)); ?>">
                                    <?php echo e($date_join ?? ''); ?>

                                </a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-success" href="<?php echo e(route('admin.users.show', $user->id)); ?>">
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
    order: [[ 5, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sh40gnnvgawn/public_html/app/resources/views/admin/users/index.blade.php ENDPATH**/ ?>