<?php $__env->startSection('mainContent'); ?>
<!-- content @s  -->
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Verification Documents</h3>
            <div class="nk-block-des text-soft">
                <p>Please ensure that bank statements or payslips are from immediate past six months.</p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <button class="btn btn-outline-success  d-none d-sm-inline-flex" data-toggle="modal" data-target="#uploadDocument"><em class="icon ni ni-upload-cloud"></em><span>Upload Document</span></button>
            <button class="btn btn-icon btn-outline-success  d-inline-flex d-sm-none" data-toggle="modal" data-target="#uploadDocument"><em class="icon ni ni-upload-cloud"></em></button>
        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="card-inner-group">
            <div class="card-inner p-0">
                <div class="nk-tb-list nk-tb-ulist">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col tb-col-md"><span>Status</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Submitted at</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Doc Type</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Description</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Document</span></div>
                        <div class="nk-tb-col nk-tb-col-tools">&nbsp;</div>
                    </div><!-- .nk-tb-item -->
                    <?php if($user->userDocuments): ?>
                        <?php
                            $count = 1;
                        ?>
                        <?php $__currentLoopData = $user->userDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userDocument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col tb-col-md pr-0">
                                    <?php if($userDocument->status === 'Pending'): ?>
                                    <span class="tb-status text-warning">Pending</span>
                                    <span data-toggle="tooltip" title="Pending since <?php echo e($userDocument->updated_at->format('d M, Y H:i A')); ?>" data-placement="top"><em class="icon ni ni-info"></em></span>
                                        
                                    <?php elseif($userDocument->status === 'Rejected'): ?>
                                    <span class="tb-status text-danger">Rejected</span>
                                    <span data-toggle="tooltip" title="Rejected at <?php echo e($userDocument->updated_at->format('d M, Y H:i A')); ?>" data-placement="top"><em class="icon ni ni-info"></em></span>

                                    <?php elseif($userDocument->status === 'Approved'): ?>
                                        <span class="tb-status text-success">Approved</span>
                                        <span data-toggle="tooltip" title="Approved at <?php echo e($userDocument->updated_at->format('d M, Y H:i A')); ?>" data-placement="top"><em class="icon ni ni-info"></em></span>
                                    <?php endif; ?>
                                </div>
                                <div class="nk-tb-col tb-col-md pr-0">
                                    <span class="tb-date"><?php echo e($userDocument->created_at->format('d M, Y H:i A')); ?></span>
                                </div>
                                <div class="nk-tb-col tb-col-md pr-0">
                                    <span class="tb-lead-sub"><?php echo e($userDocument->document_type); ?></span>
                                </div>
                                <div class="nk-tb-col tb-col-md pr-0">
                                    <?php if($userDocument->description): ?>
                                        <a href="#" class="link link-light" data-toggle="modal" data-target="#readDescription-<?php echo e($count); ?>">Read Description</a>
                                        <!-- Document Description Modal @s  -->
                                        <div class="modal fadabindex="-1" role="dialog" id="readDescription-<?php echo e($count); ?>">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                    <div class="modal-header">
                                                        <h5>Document Description</h5>
                                                    </div>
                                                    <div class="modal-body modal-body-sm">
                                                        <p><?php echo e($userDocument->description); ?></p>
                                                    </div><!-- .modal-body -->
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <span class="">No Description</span>
                                    <?php endif; ?>
                                </div>
                                <div class="nk-tb-col tb-col-md pr-0">
                                    <ul class="list-inline list-download">
                                        <?php if($userDocument->document_file): ?>
                                        <li><a href="<?php echo e($userDocument->document_file->getUrl()); ?>" target="__blank"  class="popup">
                                            <?php echo e(trans('global.view_file')); ?>

                                            <em class="icon ni ni-download"></em>
                                        </a></li>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <div class="nk-tb-actions gx-1">
                                        <form action="<?php echo e(route('user.document.delete')); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="hidden" name="id" value="<?php echo e($userDocument->id); ?>">
                                            <button type="submit" class="btn btn-outline-danger" value="<?php echo e(trans('global.delete')); ?>"><em class="icon ni ni-trash"></em><span>Delete</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- .nk-tb-item -->
                            <?php
                                $count++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?> 
                            <p>No file uploaded yet.</p>
                    <?php endif; ?>
                </div>
            </div><!-- .card-inner --> 
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->
<!-- content @e  -->





<!-- Upload Document Modal @s  -->
<div class="modal fadabindex="-1" role="dialog" id="uploadDocument">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                
                <div class="kyc-app wide-sm m-auto">
                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                        <div class="nk-block-head-content text-center">
                            
                            <h3 class="nk-block-title fw-normal">Document Upload</h3>
                            <div class="nk-block-des">
                                <p class="sub-title">To approve your loan, please upload the following documents: <br>
                                    Payslips/Bank Statement, Employment/Promotion Letter, Government Issused ID.
                                </p>
                            </div>
                        </div>
                    </div><!-- nk-block -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="nk-kycfm">
                                <form method="POST" action="<?php echo e(route("user.document.store")); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="nk-kycfm-content">
                                        <div class="row g-4 pb-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <label class="form-label" for="document_type">Select Document</label>
                                                    </div>
                                                    <div class="form-control-group">
                                                        <div class="form-control-wrap">
                                                            <select class="form-select <?php echo e($errors->has('document_type') ? 'is-invalid' : ''); ?>" name="document_type" id="document_type" required>
                                                                <option value disabled <?php echo e(old('document_type', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                                                                <?php $__currentLoopData = App\Document::DOCUMENT_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($key); ?>" <?php echo e(old('document_type', '') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                        </div>
                                        <h6 class="title">To avoid delays when verifying account, Please make sure bellow:</h6>
                                        <ul class="list list-sm list-checked">
                                            <li>Chosen credential must not be expired.</li>
                                            <li>Document should be in good condition and clearly visible.</li>
                                        </ul>
                                        <div class="nk-kycfm-upload">
                                            <h6 class="title nk-kycfm-upload-title">Upload Here</h6>
                                            <div class="row align-items-center">
                                                <div class="col-sm-12">
                                                    <div class="nk-kycfm-upload-box">
                                                        <div class="needsclick dropzone <?php echo e($errors->has('document_file') ? 'is-invalid' : ''); ?>" id="document_file-dropzone">
                                                            <div class="dz-message" data-dz-message>
                                                                <span class="dz-message-text">Drag and drop file</span>
                                                                <span class="dz-message-or">or</span>
                                                                <span class="dz-message-text">Click Here</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- nk-kycfm-upload -->
                                        <div class="row g-4 pt-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <label class="form-label" for="description"><?php echo e(trans('cruds.customerDocument.fields.description')); ?></label>
                                                    </div>
                                                    <div class="form-control-group">
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" name="description" id="description"><?php echo e(old('description')); ?></textarea>
                                                            <?php if($errors->has('description')): ?>
                                                                <div class="invalid-feedback">
                                                                    <?php echo e($errors->first('description')); ?>

                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                        </div>
                                    </div><!-- nk-kycfm-content -->
                                    <div class="nk-kycfm-footer">
                                        <div class="form-group">
                                            <div class="custom-control custom-control-xs custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="tc-agree" required>
                                                <label class="custom-control-label" for="tc-agree">I Have Read The <a href="https://efinanceng.com/terms.php" target="_blank">Terms Of Condition</a> And <a href="https://efinanceng.com/privacy.php" target="_blank">Privacy Policy</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-control-xs custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="info-assure" required>
                                                <label class="custom-control-label" for="info-assure">All The Personal Information I Have Entered Is Correct.</label>
                                            </div>
                                        </div>
                                        <div class="nk-kycfm-action pt-2">
                                            <button type="submit" class="btn btn-lg btn-success">Upload Document</button>
                                        </div>
                                    </div><!-- nk-kycfm-footer -->
                                </form>
                            </div><!-- nk-kycfm -->
                        </div><!-- .card -->
                    </div><!-- nk-block -->
                </div><!-- .kyc-app -->
                
            </div><!-- .modal-body -->
        </div>
    </div>
</div>

<!-- Upload Document Modal @e  -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    Dropzone.options.documentFileDropzone = {
    url: '<?php echo e(route('user.document.storeMedia')); ?>',
    maxFilesize: 30, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
      size: 30
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
    <?php if(isset($document) && $document->document_file): ?>
        var file = <?php echo json_encode($document->document_file); ?>

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
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sh40gnnvgawn/public_html/app/resources/views/user/document/index.blade.php ENDPATH**/ ?>