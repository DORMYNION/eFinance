<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.customerDocument.title')); ?>

    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.customer-documents.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($customerDocument->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.customer')); ?>

                        </th>
                        <td>
                            <?php echo e($customerDocument->customer->first_name ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.document_type')); ?>

                        </th>
                        <td>
                            <?php echo e(App\CustomerDocument::DOCUMENT_TYPE_SELECT[$customerDocument->document_type] ?? ''); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.document_file')); ?>

                        </th>
                        <td>
                            <?php if($customerDocument->document_file): ?>
                                <a href="<?php echo e($customerDocument->document_file->getUrl()); ?>" target="_blank">
                                    <?php echo e(trans('global.view_file')); ?>

                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.customerDocument.fields.description')); ?>

                        </th>
                        <td>
                            <?php echo e($customerDocument->description); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="<?php echo e(route('admin.customer-documents.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/customerDocuments/show.blade.php ENDPATH**/ ?>