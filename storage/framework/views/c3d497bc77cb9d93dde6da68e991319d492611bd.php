<?php $__env->startSection('content'); ?>
<?php $__env->startSection('breadcrumb', 'All Users / ' . $customer->first_name . ' ' . $customer->last_name); ?>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card card-accent-info">
            <div class="row no-gutters">
                <div class="col-md-4 no-gutters bg-dark p-4">
                    <?php if($customer->profile_image): ?>
                        <a href="<?php echo e($customer->profile_image->getUrl()); ?>" target="_blank">
                            <img src="<?php echo e($customer->profile_image->getUrl('thumb')); ?>"  alt="Profile Image" class="card-img p-2">
                        </a>
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/profile/default.png')); ?>" alt="Profile Image" class="card-img p-2">
                    </div>
                    <?php endif; ?>
                <div class="col-md-8 pt-4">
                    <div class="card-body">
                        <h3 class="card-text pb-2"><strong>Name:</strong> &nbsp;&nbsp;<span class="card-title text-right"><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></span></h3>
                        <h3 class="card-text pb-2"><strong>Bvn:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="card-title text-right"><?php echo e($customer->bvn); ?></span></h3>
                        <h3 class="card-text pb-2"><strong>Phone:</strong> &nbsp;<span class="card-title text-right"><?php echo e($customer->mobile_no_1); ?></span></h3>
                        <h3 class="card-text pb-2"><strong>Email:</strong> &nbsp;&nbsp;&nbsp;<span class="card-title text-right"><?php echo e($customer->email); ?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 d-flex justify-content-end">
        <div class="form-group">
            <a class="btn btn-dark btn-lg" href="<?php echo e(route('admin.customers.index')); ?>">
                Back to All Users
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-xl-6">
        <div class="card">
            <hr class="m-0">
            <div class="card-header h4 font-weight-bolder">Contact Detail's</div>
            <div class="card-body p-0">
                <table class="table table-responsive-sm">
                    <tr class=" table-borderless">
                        <th>Gender</th>
                        <td class="text-right"><?php echo e(App\Customer::GENDER_SELECT[$customer->gender] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td class="text-right"><?php echo e($customer->date_of_birth); ?></td>
                    </tr>
                    <tr>
                        <th>Alternative No</th>
                        <td class="text-right"><?php echo e($customer->mobile_no_2); ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td class="text-right"><?php echo e($customer->address); ?></td>
                    </tr>
                    <tr>
                        <th>Land Mark</th>
                        <td class="text-right"><?php echo e($customer->land_mark); ?></td>
                    </tr>
                    <tr>
                        <th>LGA of Residence</th>
                        <td class="text-right"><?php echo e(App\Customer::LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT[$customer->state_of_residence] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>State of Residence</th>
                        <td class="text-right"><?php echo e(App\Customer::STATE_OF_RESIDENCE_SELECT[$customer->state_of_residence] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Status of Residence</th>
                        <td class="text-right"><?php echo e(App\Customer::STATUS_OF_RESIDENCE_SELECT[$customer->state_of_residence] ?? ''); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <hr class="m-0">
            <div class="card-header h4 font-weight-bolder">Employment Detail's</div>
            <div class="card-body p-0">
                <table class="table table-responsive-sm">
                    <tr class=" table-borderless">
                        <th>Monthly Income</th>
                        <td class="text-right"><?php echo e($customer->monthly_income); ?></td>
                    </tr>
                    <tr>
                        <th>Employment Sector</th>
                        <td class="text-right"><?php echo e(App\Customer::EMPLOYMENT_SECTOR_SELECT[$customer->employment_sector] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Employer's Name</th>
                        <td class="text-right"><?php echo e($customer->employers_name); ?></td>
                    </tr>
                    <tr>
                        <th>Employment Address</th>
                        <td class="text-right"><?php echo e($customer->employers_address); ?></td>
                    </tr>
                    <tr>
                        <th>Employment Land Mark</th>
                        <td class="text-right"><?php echo e($customer->employers_land_mark); ?></td>
                    </tr>
                    <tr>
                        <th>Employment LGA</th>
                        <td class="text-right"><?php echo e(App\Customer::EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT[$customer->employers_local_government_area] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Employment State</th>
                        <td class="text-right"><?php echo e(App\Customer::EMPLOYERS_STATE_SELECT[$customer->employers_state] ?? ''); ?></td>
                    </tr>                    
                </table>
            </div>
        </div>

        <div class="card">
            <hr class="m-0">
            <div class="card-header h4 font-weight-bolder">Bank Detail's</div>
            <div class="card-body p-0">
                <table class="table table-responsive-sm">
                    <tr class=" table-borderless">
                        <th>Bank Name</th>
                        <td class="text-right"><?php echo e(App\Customer::BANK_NAME_SELECT[$customer->bank_name] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Account Name</th>
                        <td class="text-right"><?php echo e($customer->account_name); ?></td>
                    </tr>
                    <tr>
                        <th>Account Number</th>
                        <td class="text-right"><?php echo e($customer->account_no); ?></td>
                    </tr>                 
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-xl-6">
        <div class="card">
            <div class="card-header h4 font-weight-bolder">Latest Application</div>
            <div class="card-body">
                <?php if($pending_loan): ?>
                    <div class="list-group">
                        <div style="border-radius: 0" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1 card-title font-weight-bold">Loan Amount</p>
                            <h3 class="mb-1 card-text">NGN <?php echo e($pending_loan->loan_amount); ?></h3>
                        </div>
                        <div style="border-radius: 0" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1 card-title font-weight-bold">Request Date</p>
                            <h3 class="mb-1 card-text"><?php echo e($pending_loan->created_at); ?></h3>
                        </div>
                        <div style="border-radius: 0" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1 card-title font-weight-bold">Tenor</p>
                            <h3 class="mb-1 card-text"><?php echo e($pending_loan->loan_duration); ?></h3>
                        </div>
                        <div style="border-radius: 0" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1 card-title font-weight-bold">Interest</p>
                            <h3 class="mb-1 card-text">NGN <?php echo e($pending_loan->interest); ?></h3>
                        </div>
                        <div style="border-radius: 0" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1 card-title font-weight-bold">Total Amount</p>
                            <h3 class="mb-1 card-text">NGN <?php echo e($pending_loan->total); ?></h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between p-5">
                        <form action="<?php echo e(route('admin.loans.decline', $pending_loan->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="status" value="Declined">
                            <input type="hidden" name="id" value="<?php echo e($pending_loan->id); ?>">
                            <input type="submit" class="btn btn-lg btn-danger" value="Decline">
                        </form>
                        <button class="btn btn-lg btn-success" data-toggle="modal" data-target="#approveLoanModal">Approve</button>
                    </div>
                <?php else: ?>
                    <p class="text-center">No pending loan</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <hr class="m-0">
            <div class="card-header h4 font-weight-bolder"><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?> Document's</div>
            <div class="card-body p-0">
                <table class="table table-responsive-sm">
                    <thead>
                        <tr class="table-borderless">
                            <th><?php echo e(trans('cruds.customerDocument.fields.document_type')); ?></th>
                            <th><?php echo e(trans('cruds.customerDocument.fields.document_file')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $customer->customerCustomerDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customerDocument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($customerDocument->id); ?>">
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
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Loan History</div>
            <div class="card-body">
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <td>Application Date</td>
                            <td>Loan Amount</td>
                            <td>Loan Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $customer->customerLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $sate_join = strtotime($loan->created_at);
                                $date_applied = date('F d, Y H:i:sa', $sate_join);
                            ?>
                            <tr data-entry-id="<?php echo e($loan->id); ?>">
                                <td><?php echo e($date_applied); ?></td>
                                <td><?php echo e($loan->loan_amount ?? ''); ?></td>
                                <td><?php echo e(App\Loan::STATUS_SELECT[$loan->status] ?? ''); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Approve Loan Modal -->
<?php if($pending_loan): ?>
<div class="modal fade" id="approveLoanModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="approveLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveLoanModalLabel">Approve Loan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route("admin.loans.update", [$pending_loan->id])); ?>" enctype="multipart/form-data" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');">
                <div class="modal-body">
                    <?php echo method_field('PATCH'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="required" for="loan_amount"><?php echo e(trans('cruds.loan.fields.loan_amount')); ?></label>
                        <input class="form-control <?php echo e($errors->has('loan_amount') ? 'is-invalid' : ''); ?>" type="number" name="loan_amount" id="loan_amount" value="<?php echo e(old('loan_amount', $pending_loan->loan_duration)); ?>" step="0.01" required>
                        <?php if($errors->has('loan_amount')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('loan_amount')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.loan.fields.loan_amount_helper')); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="loan_duration"><?php echo e(trans('cruds.loan.fields.loan_duration')); ?></label>
                        <input class="form-control <?php echo e($errors->has('loan_duration') ? 'is-invalid' : ''); ?>" type="number" name="loan_duration" id="loan_duration" value="<?php echo e(old('loan_duration', $pending_loan->loan_duration)); ?>" step="1" required>
                        <?php if($errors->has('loan_duration')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('loan_duration')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.loan.fields.loan_duration_helper')); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="interest"><?php echo e(trans('cruds.loan.fields.interest')); ?></label>
                        <input class="form-control <?php echo e($errors->has('interest') ? 'is-invalid' : ''); ?>" type="number" name="interest" id="interest" value="<?php echo e(old('interest', $pending_loan->interest)); ?>" step="0.01" required>
                        <?php if($errors->has('interest')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('interest')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.loan.fields.interest_helper')); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="total"><?php echo e(trans('cruds.loan.fields.total')); ?></label>
                        <input class="form-control <?php echo e($errors->has('total') ? 'is-invalid' : ''); ?>" type="number" name="total" id="total" value="<?php echo e(old('total', $pending_loan->total)); ?>" step="0.01" required>
                        <?php if($errors->has('total')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('total')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.loan.fields.total_helper')); ?></span>
                    </div>
                    <input type="hidden" name="status" value="Approved">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-lg btn-success">Approve</button> 
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/eFinance/resources/views/admin/customers/show.blade.php ENDPATH**/ ?>