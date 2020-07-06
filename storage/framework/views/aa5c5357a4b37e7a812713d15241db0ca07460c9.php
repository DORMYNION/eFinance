<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_document_create')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route('admin.customer-documents.create')); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.customerDocument.title_singular')); ?>

            </a>
        </div>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.customerDocument.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-customerCustomerDocuments">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.customer')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.document_type')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.document_file')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.description')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $customerDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customerDocument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($customerDocument->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($customerDocument->id ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($customerDocument->customer->first_name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\CustomerDocument::DOCUMENT_TYPE_SELECT[$customerDocument->document_type] ?? ''); ?>

                            </td>
                            <td>
                                <?php if($customerDocument->document_file): ?>
                                    <a href="<?php echo e($customerDocument->document_file->getUrl()); ?>" target="_blank">
                                        <?php echo e(trans('global.view_file')); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($customerDocument->description ?? ''); ?>

                            </td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_document_show')): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.customer-documents.show', $customerDocument->id)); ?>">
                                        <?php echo e(trans('global.view')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_document_edit')): ?>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.customer-documents.edit', $customerDocument->id)); ?>">
                                        <?php echo e(trans('global.edit')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_document_delete')): ?>
                                    <form action="<?php echo e(route('admin.customer-documents.destroy', $customerDocument->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
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
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_document_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.customer-documents.massDestroy')); ?>",
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
  let table = $('.datatable-customerCustomerDocuments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/customers/relationships/customerCustomerDocuments.blade.php ENDPATH**/ ?>