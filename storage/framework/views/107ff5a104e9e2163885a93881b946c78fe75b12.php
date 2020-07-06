<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan_create')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route('admin.loans.create')); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.loan.title_singular')); ?>

            </a>
        </div>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.loan.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-customerLoans">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.customer')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_exist')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_exist_type')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_exist_amount')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.purpose_of_loan')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.repayment_option')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_amount')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.loan_duration')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.interest')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.total')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.viewed')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.loan.fields.status')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($loan->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($loan->id ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($loan->customer->first_name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\Loan::LOAN_EXIST_SELECT[$loan->loan_exist] ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\Loan::LOAN_EXIST_TYPE_SELECT[$loan->loan_exist_type] ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($loan->loan_exist_amount ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\Loan::PURPOSE_OF_LOAN_SELECT[$loan->purpose_of_loan] ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\Loan::REPAYMENT_OPTION_SELECT[$loan->repayment_option] ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($loan->loan_amount ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($loan->loan_duration ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($loan->interest ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($loan->total ?? ''); ?>

                            </td>
                            <td>
                                <span style="display:none"><?php echo e($loan->viewed ?? ''); ?></span>
                                <input type="checkbox" disabled="disabled" <?php echo e($loan->viewed ? 'checked' : ''); ?>>
                            </td>
                            <td>
                                <?php echo e(App\Loan::STATUS_SELECT[$loan->status] ?? ''); ?>

                            </td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan_show')): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.loans.show', $loan->id)); ?>">
                                        <?php echo e(trans('global.view')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan_edit')): ?>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.loans.edit', $loan->id)); ?>">
                                        <?php echo e(trans('global.edit')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan_delete')): ?>
                                    <form action="<?php echo e(route('admin.loans.destroy', $loan->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="submit" class="btn btn-xs btn-danger" value="<?php echo e(trans('global.delete')); ?>">
                                    </form>
                                <?php endif; ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.loans.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

        return
      }

      if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
<?php endif; ?>

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-customerLoans:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/customers/relationships/customerLoans.blade.php ENDPATH**/ ?>