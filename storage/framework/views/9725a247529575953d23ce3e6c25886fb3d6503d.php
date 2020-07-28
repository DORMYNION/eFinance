<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.customer.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.customers.update", [$customer->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.title')); ?></label>
                <select class="form-control <?php echo e($errors->has('title') ? 'is-invalid' : ''); ?>" name="title" id="title" required>
                    <option value disabled <?php echo e(old('title', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::TITLE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('title', $customer->title) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('title')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('title')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.title_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.gender')); ?></label>
                <select class="form-control <?php echo e($errors->has('gender') ? 'is-invalid' : ''); ?>" name="gender" id="gender" required>
                    <option value disabled <?php echo e(old('gender', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::GENDER_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('gender', $customer->gender) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('gender')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('gender')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.gender_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_no_1"><?php echo e(trans('cruds.customer.fields.mobile_no_1')); ?></label>
                <input class="form-control <?php echo e($errors->has('mobile_no_1') ? 'is-invalid' : ''); ?>" type="text" name="mobile_no_1" id="mobile_no_1" value="<?php echo e(old('mobile_no_1', $customer->mobile_no_1)); ?>" required>
                <?php if($errors->has('mobile_no_1')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('mobile_no_1')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.mobile_no_1_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="mobile_no_2"><?php echo e(trans('cruds.customer.fields.mobile_no_2')); ?></label>
                <input class="form-control <?php echo e($errors->has('mobile_no_2') ? 'is-invalid' : ''); ?>" type="text" name="mobile_no_2" id="mobile_no_2" value="<?php echo e(old('mobile_no_2', $customer->mobile_no_2)); ?>">
                <?php if($errors->has('mobile_no_2')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('mobile_no_2')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.mobile_no_2_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="email"><?php echo e(trans('cruds.customer.fields.email')); ?></label>
                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="email" name="email" id="email" value="<?php echo e(old('email', $customer->email)); ?>" required>
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.email_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="address"><?php echo e(trans('cruds.customer.fields.address')); ?></label>
                <input class="form-control <?php echo e($errors->has('address') ? 'is-invalid' : ''); ?>" type="text" name="address" id="address" value="<?php echo e(old('address', $customer->address)); ?>" required>
                <?php if($errors->has('address')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('address')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.address_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="land_mark"><?php echo e(trans('cruds.customer.fields.land_mark')); ?></label>
                <input class="form-control <?php echo e($errors->has('land_mark') ? 'is-invalid' : ''); ?>" type="text" name="land_mark" id="land_mark" value="<?php echo e(old('land_mark', $customer->land_mark)); ?>" required>
                <?php if($errors->has('land_mark')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('land_mark')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.land_mark_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.state_of_residence')); ?></label>
                <select class="form-control <?php echo e($errors->has('state_of_residence') ? 'is-invalid' : ''); ?>" name="state_of_residence" id="state_of_residence" required>
                    <option value disabled <?php echo e(old('state_of_residence', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::STATE_OF_RESIDENCE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('state_of_residence', $customer->state_of_residence) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('state_of_residence')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('state_of_residence')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.state_of_residence_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.local_government_area_of_residence')); ?></label>
                <select class="form-control <?php echo e($errors->has('local_government_area_of_residence') ? 'is-invalid' : ''); ?>" name="local_government_area_of_residence" id="local_government_area_of_residence" required>
                    <option value disabled <?php echo e(old('local_government_area_of_residence', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('local_government_area_of_residence', $customer->local_government_area_of_residence) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('local_government_area_of_residence')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('local_government_area_of_residence')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.local_government_area_of_residence_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.status_of_residence')); ?></label>
                <select class="form-control <?php echo e($errors->has('status_of_residence') ? 'is-invalid' : ''); ?>" name="status_of_residence" id="status_of_residence" required>
                    <option value disabled <?php echo e(old('status_of_residence', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::STATUS_OF_RESIDENCE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('status_of_residence', $customer->status_of_residence) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('status_of_residence')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('status_of_residence')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.status_of_residence_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="monthly_income"><?php echo e(trans('cruds.customer.fields.monthly_income')); ?></label>
                <input class="form-control <?php echo e($errors->has('monthly_income') ? 'is-invalid' : ''); ?>" type="number" name="monthly_income" id="monthly_income" value="<?php echo e(old('monthly_income', $customer->monthly_income)); ?>" step="0.01" required>
                <?php if($errors->has('monthly_income')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('monthly_income')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.monthly_income_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.employment_sector')); ?></label>
                <select class="form-control <?php echo e($errors->has('employment_sector') ? 'is-invalid' : ''); ?>" name="employment_sector" id="employment_sector" required>
                    <option value disabled <?php echo e(old('employment_sector', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::EMPLOYMENT_SECTOR_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('employment_sector', $customer->employment_sector) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('employment_sector')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('employment_sector')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.employment_sector_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="employers_name"><?php echo e(trans('cruds.customer.fields.employers_name')); ?></label>
                <input class="form-control <?php echo e($errors->has('employers_name') ? 'is-invalid' : ''); ?>" type="text" name="employers_name" id="employers_name" value="<?php echo e(old('employers_name', $customer->employers_name)); ?>" required>
                <?php if($errors->has('employers_name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('employers_name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.employers_name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="employers_address"><?php echo e(trans('cruds.customer.fields.employers_address')); ?></label>
                <input class="form-control <?php echo e($errors->has('employers_address') ? 'is-invalid' : ''); ?>" type="text" name="employers_address" id="employers_address" value="<?php echo e(old('employers_address', $customer->employers_address)); ?>" required>
                <?php if($errors->has('employers_address')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('employers_address')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.employers_address_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="employers_land_mark"><?php echo e(trans('cruds.customer.fields.employers_land_mark')); ?></label>
                <input class="form-control <?php echo e($errors->has('employers_land_mark') ? 'is-invalid' : ''); ?>" type="text" name="employers_land_mark" id="employers_land_mark" value="<?php echo e(old('employers_land_mark', $customer->employers_land_mark)); ?>" required>
                <?php if($errors->has('employers_land_mark')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('employers_land_mark')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.employers_land_mark_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.employers_state')); ?></label>
                <select class="form-control <?php echo e($errors->has('employers_state') ? 'is-invalid' : ''); ?>" name="employers_state" id="employers_state" required>
                    <option value disabled <?php echo e(old('employers_state', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::EMPLOYERS_STATE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('employers_state', $customer->employers_state) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('employers_state')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('employers_state')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.employers_state_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.employers_local_government_area')); ?></label>
                <select class="form-control <?php echo e($errors->has('employers_local_government_area') ? 'is-invalid' : ''); ?>" name="employers_local_government_area" id="employers_local_government_area" required>
                    <option value disabled <?php echo e(old('employers_local_government_area', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('employers_local_government_area', $customer->employers_local_government_area) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('employers_local_government_area')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('employers_local_government_area')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.employers_local_government_area_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="profile_image"><?php echo e(trans('cruds.customer.fields.profile_image')); ?></label>
                <div class="needsclick dropzone <?php echo e($errors->has('profile_image') ? 'is-invalid' : ''); ?>" id="profile_image-dropzone">
                </div>
                <?php if($errors->has('profile_image')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('profile_image')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.profile_image_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="password"><?php echo e(trans('cruds.customer.fields.password')); ?></label>
                <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" type="password" name="password" id="password">
                <?php if($errors->has('password')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.password_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.customer.fields.bank_name')); ?></label>
                <select class="form-control <?php echo e($errors->has('bank_name') ? 'is-invalid' : ''); ?>" name="bank_name" id="bank_name" required>
                    <option value disabled <?php echo e(old('bank_name', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::BANK_NAME_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('bank_name', $customer->bank_name) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('bank_name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('bank_name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.bank_name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="account_name"><?php echo e(trans('cruds.customer.fields.account_name')); ?></label>
                <input class="form-control <?php echo e($errors->has('account_name') ? 'is-invalid' : ''); ?>" type="text" name="account_name" id="account_name" value="<?php echo e(old('account_name', $customer->account_name)); ?>" required>
                <?php if($errors->has('account_name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('account_name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.account_name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="account_no"><?php echo e(trans('cruds.customer.fields.account_no')); ?></label>
                <input class="form-control <?php echo e($errors->has('account_no') ? 'is-invalid' : ''); ?>" type="text" name="account_no" id="account_no" value="<?php echo e(old('account_no', $customer->account_no)); ?>" required>
                <?php if($errors->has('account_no')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('account_no')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.account_no_helper')); ?></span>
            </div>
            <div class="form-group">
                <label><?php echo e(trans('cruds.customer.fields.status')); ?></label>
                <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status" id="status">
                    <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Customer::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('status', $customer->status) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('status')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('status')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.customer.fields.status_helper')); ?></span>
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
    Dropzone.options.profileImageDropzone = {
    url: '<?php echo e(route('admin.customers.storeMedia')); ?>',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
      size: 1,
      width: 400,
      height: 400
    },
    success: function (file, response) {
      $('form').find('input[name="profile_image"]').remove()
      $('form').append('<input type="hidden" name="profile_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
<?php if(isset($customer) && $customer->profile_image): ?>
      var file = <?php echo json_encode($customer->profile_image); ?>

          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '<?php echo e($customer->profile_image->getUrl('thumb')); ?>')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile_image" value="' + file.file_name + '">')
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/customers/edit.blade.php ENDPATH**/ ?>