<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.customerDocument.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.customer-documents.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="customer_id"><?php echo e(trans('cruds.customerDocument.fields.customer')); ?></label>
                <select class="form-control select2 <?php echo e($errors->has('customer') ? 'is-invalid' : ''); ?>" name="customer_id" id="customer_id" required>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e(old('customer_id') == $id ? 'selected' : ''); ?>><?php echo e($customer); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('customer')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('customer')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customerDocument.fields.customer_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customerDocument.fields.document_type')); ?></label>
                <select class="form-control <?php echo e($errors->has('document_type') ? 'is-invalid' : ''); ?>" name="document_type" id="document_type" required>
                    <option value disabled <?php echo e(old('document_type', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\CustomerDocument::DOCUMENT_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('document_type', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('document_type')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('document_type')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customerDocument.fields.document_type_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="document_file"><?php echo e(trans('cruds.customerDocument.fields.document_file')); ?></label>
                <div class="needsclick dropzone <?php echo e($errors->has('document_file') ? 'is-invalid' : ''); ?>" id="document_file-dropzone">
                </div>
                <?php if($errors->has('document_file')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('document_file')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customerDocument.fields.document_file_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="description"><?php echo e(trans('cruds.customerDocument.fields.description')); ?></label>
                <textarea class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" name="description" id="description"><?php echo e(old('description')); ?></textarea>
                <?php if($errors->has('description')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('description')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customerDocument.fields.description_helper')); ?></span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    Dropzone.options.documentFileDropzone = {
    url: '<?php echo e(route('admin.customer-documents.storeMedia')); ?>',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="document_file"]').remove()
      $('form').append('<input type="hidden" name="document_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="document_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
<?php if(isset($customerDocument) && $customerDocument->document_file): ?>
      var file = <?php echo json_encode($customerDocument->document_file); ?>

          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
<?php endif; ?>
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/customerDocuments/create.blade.php ENDPATH**/ ?>