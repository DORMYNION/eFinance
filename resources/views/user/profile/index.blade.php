@extends('layouts.user')

@section('mainContent')

<div class="nk-block-head">
    <div class="row">
        <div class="col-md-8">
            <div class="nk-block-head-content">
                <div class="nk-block-head-sub"><span>Account Setting</span></div>
                <h2 class="nk-block-title fw-normal">My Profile</h2>
                <div class="nk-block-des">
                    <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info"></em></span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="user-card user-card-s2">
                <div class="user-avatar xl mx-0">
                    @if($user->profile_image)
                        <a href="{{ url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name) }}" target="_blank">
                            <img class="img-fluid no-border" src="{{ url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name) }}"  alt="{{ $user->name }} Profile Image">
                        </a>
                    @else
                        <img class="img-fluid no-border" src="{{ asset('img/profile/default.jpeg') }}" alt="{{ $user->name }} Profile Image">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block-head -->
<ul class="nk-nav nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#personalDetail">Personal Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#contactDetail">Contact Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#employmentDetail">Employment Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#bankDetail">Bank Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#secSetting">Picture & Password</a>
    </li>
</ul><!-- nav-tabs -->

<div class="tab-content">
    <div class="tab-pane active" id="personalDetail">
        <div class="nk-block active">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Personal Information</h5>
                    <div class="nk-block-des">
                        <p>Basic info, like your name, gender, ...</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="card card-bordered">
                <div class="nk-data data-list">
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Title</span>
                            <span class="data-value">{{ App\User::TITLE_SELECT[$user->title] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">First Name</span>
                            <span class="data-value">{{ $user->first_name }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Last Name</span>
                            <span class="data-value">{{ $user->last_name }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Gender</span>
                            <span class="data-value">{{ App\User::GENDER_SELECT[$user->gender] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Date of Birth</span>
                            <span class="data-value">{{ $user->date_of_birth }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Marital Status</span>
                            <span class="data-value">{{ App\User::MARITAL_STATUS_SELECT[$user->marital_status] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                </div><!-- .nk-data -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <div class="tab-pane" id="contactDetail">
        <div class="nk-block">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Contact Information</h5>
                    <div class="nk-block-des">
                        <p>Contact info, like your Mobile No, Address, ...</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="card card-bordered">
                <div class="nk-data data-list">
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Mobile No</span>
                            <span class="data-value">{{ $user->mobile_no_1 }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Alternative No</span>
                            <span class="data-value">{{ $user->mobile_no_2 }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Email</span>
                            <span class="data-value">{{ $user->email }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Address</span>
                            <span class="data-value">{{ $user->address }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Land Mark</span>
                            <span class="data-value">{{ $user->land_mark }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Local Govt. Area (LGA)</span>
                            <span class="data-value">{{ App\User::LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT[$user->local_government_area_of_residence] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">State of Residence</span>
                            <span class="data-value">{{ App\User::STATE_OF_RESIDENCE_SELECT[$user->state_of_residence] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Status of Residence</span>
                            <span class="data-value">{{ App\User::STATUS_OF_RESIDENCE_SELECT[$user->status_of_residence] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                </div><!-- .nk-data -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <div class="tab-pane" id="employmentDetail">
        <div class="nk-block">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Employment Information</h5>
                    <div class="nk-block-des">
                        <p>Employment info, like your employer's name, employer's address, ...</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="card card-bordered">
                <div class="nk-data data-list">
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">PayDay</span>
                            <span class="data-value">{{ $user->payday }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Monthly Income</span>
                            <span class="data-value">{{ $user->monthly_income }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Employment Name</span>
                            <span class="data-value">{{ $user->employers_name }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Employment Sector</span>
                            <span class="data-value">{{ App\User::EMPLOYMENT_SECTOR_SELECT[$user->employment_sector] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Employment Address</span>
                            <span class="data-value">{{ $user->employers_address }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Employment Land Mark</span>
                            <span class="data-value">{{ $user->employers_land_mark }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Employment Local Govt. Area (LGA)</span>
                            <span class="data-value">{{ App\User::EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT[$user->employers_local_government_area] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Employment State of Residence</span>
                            <span class="data-value">{{ App\User::EMPLOYERS_STATE_SELECT[$user->employers_state] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                </div><!-- .nk-data -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <div class="tab-pane" id="bankDetail">
        <div class="nk-block">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Bank Information</h5>
                    <div class="nk-block-des">
                        <p>Bank info, like your bank name, account no and account name.</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="card card-bordered">
                <div class="nk-data data-list">
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Bank Verification No (BVN)</span>
                            <span class="data-value">{{ $user->bvn }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Bank Name</span>
                            <span class="data-value">{{ App\User::BANK_NAME_SELECT[$user->bank_name] }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Account Name</span>
                            <span class="data-value">{{ $user->account_name }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Account No</span>
                            <span class="data-value">{{ $user->account_no }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Payment Method</span>
                            <span class="data-value">{{ $user->payment_method }}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                </div><!-- .nk-data -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <div class="tab-pane" id="secSetting">
        <div class="nk-block">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title title">Picture & Password </h5>
                    <div class="nk-block-des">
                        <p>Change your profile picture and password here.</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="card card-bordered">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="nk-block-text">
                                <h6>Change Profile Picture</h6>
                                <p>Update your profile picture.</p>
                            </div>
                            <div class="nk-block-actions flex-shrink-sm-0">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                    <li class="order-md-last">
                                        <button data-toggle="modal" data-target="#uploadProfilePicture" class="btn btn-primary">Upload Picture</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-card-inner -->
                    {{-- <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="nk-block-text">
                                <h6>Change Email</h6>
                                <p>Set a unique email to protect your account.</p>
                            </div>
                            <div class="nk-block-actions flex-shrink-sm-0">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                    <li class="order-md-last">
                                        <button data-toggle="modal" data-target="#changeEmail" class="btn btn-primary">Change Email</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <!-- .nk-card-inner -->
                    <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="nk-block-text">
                                <h6>Change Password</h6>
                                <p>Set a unique password to protect your account.</p>
                            </div>
                            <div class="nk-block-actions flex-shrink-sm-0">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                    <li class="order-md-last">
                                        <button data-toggle="modal" data-target="#changePassword" class="btn btn-primary">Change Password</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-card-inner -->
                </div><!-- .nk-card-inner-group -->
            </div><!-- .nk-card -->
        </div>
    </div>
</div>


<!-- @@ Profile Edit Modal @e -->
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personalUpdateForm">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contactUpdateForm">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#employmentUpdateForm">Employment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#bankUpdateForm">Bank</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <form method="post" action="{{ route("user.profile.update") }}" enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalUpdateForm">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" required>
                                                <option value disabled {{ old('title', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                @foreach(App\User::TITLE_SELECT as $key => $label)
                                                    <option value="{{ $key }}" {{ old('title', $user->title) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="gender">Gender</label>
                                        <select class="form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                                            <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::GENDER_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('gender', $user->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="date_of_birth">Date of Birth</label>
                                        <input class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="marital_status">Marital Status</label>
                                        <select class="form-select {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status" required>
                                            <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::MARITAL_STATUS_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('marital_status', $user->marital_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="contactUpdateForm">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="mobile_no_1">Mobile No</label>
                                        <input class="form-control {{ $errors->has('mobile_no_1') ? 'is-invalid' : '' }}" type="text" name="mobile_no_1" id="mobile_no_1" value="{{ old('mobile_no_1', $user->mobile_no_1) }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="mobile_no_2">Alternative No</label>
                                        <input class="form-control {{ $errors->has('mobile_no_2') ? 'is-invalid' : '' }}" type="text" name="mobile_no_2" id="mobile_no_2" value="{{ old('mobile_no_2', $user->mobile_no_2) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Address</label>
                                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $user->address) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="land_mark">Land Mark</label>
                                        <input class="form-control {{ $errors->has('land_mark') ? 'is-invalid' : '' }}" type="text" name="land_mark" id="land_mark" value="{{ old('land_mark', $user->land_mark) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="local_government_area_of_residence">LGA of Residence</label>
                                        <select class="form-select {{ $errors->has('local_government_area_of_residence') ? 'is-invalid' : '' }}" name="local_government_area_of_residence" id="local_government_area_of_residence" required>
                                            <option value disabled {{ old('local_government_area_of_residence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('local_government_area_of_residence', $user->local_government_area_of_residence) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="state_of_residence">State of Residence</label>
                                        <select class="form-select {{ $errors->has('state_of_residence') ? 'is-invalid' : '' }}" name="state_of_residence" id="state_of_residence" required>
                                            <option value disabled {{ old('state_of_residence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::STATE_OF_RESIDENCE_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('state_of_residence', $user->state_of_residence) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="state_of_residence">State of Residence</label>
                                        <select class="form-select {{ $errors->has('status_of_residence') ? 'is-invalid' : '' }}" name="status_of_residence" id="status_of_residence" required>
                                            <option value disabled {{ old('status_of_residence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::STATUS_OF_RESIDENCE_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('status_of_residence', $user->status_of_residence) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="employmentUpdateForm">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="monthly_income">Mobile No</label>
                                        <input class="form-control {{ $errors->has('monthly_income') ? 'is-invalid' : '' }}" type="number" name="monthly_income" id="monthly_income" value="{{ old('monthly_income', $user->monthly_income) }}" step="1000" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="employment_sector">Employment Sector</label>
                                        <select class="form-select {{ $errors->has('employment_sector') ? 'is-invalid' : '' }}" name="employment_sector" id="employment_sector" required>
                                            <option value disabled {{ old('employment_sector', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::EMPLOYMENT_SECTOR_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('employment_sector', $user->employment_sector) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="employers_name">Employers Name</label>
                                        <input class="form-control {{ $errors->has('employers_name') ? 'is-invalid' : '' }}" type="text" name="employers_name" id="employers_name" value="{{ old('employers_name', $user->employers_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label" for="employers_address">Employment Address</label>
                                        <input class="form-control {{ $errors->has('employers_address') ? 'is-invalid' : '' }}" type="text" name="employers_address" id="employers_address" value="{{ old('employers_address', $user->employers_address) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="employers_land_mark">Employment Land Mark</label>
                                        <input class="form-control {{ $errors->has('employers_land_mark') ? 'is-invalid' : '' }}" type="text" name="employers_land_mark" id="employers_land_mark" value="{{ old('employers_land_mark', $user->employers_land_mark) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="employers_local_government_area">Employment LGA</label>
                                        <select class="form-control {{ $errors->has('employers_local_government_area') ? 'is-invalid' : '' }}" name="employers_local_government_area" id="employers_local_government_area" required>
                                            <option value disabled {{ old('employers_local_government_area', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('employers_local_government_area', $user->employers_local_government_area) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="employers_state">Employment State</label>
                                        <select class="form-select {{ $errors->has('employers_state') ? 'is-invalid' : '' }}" name="employers_state" id="employers_state" required>
                                            <option value disabled {{ old('employers_state', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::EMPLOYERS_STATE_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('employers_state', $user->employers_state) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="bankUpdateForm">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="bank_name">Bank Name</label>
                                        <select class="form-select {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" name="bank_name" id="bank_name" required>
                                            <option value disabled {{ old('bank_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\User::BANK_NAME_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('bank_name', $user->bank_name) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="account_name">Account Name</label>
                                        <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', $user->account_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="account_no">Account No</label>
                                        <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ old('account_no', $user->account_no) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_method">Payment Method</label>
                                        <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $user->payment_method) }}" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                        <div class="row gy-4">
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button href="submit" class="btn btn-lg btn-primary">Update Address</button>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-content -->
                </form>
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="uploadProfilePicture">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>

            <div class="modal-body modal-body-lg">
                <h5 class="title">Security Settings</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#changeEmail">Upload Profile Picture</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="changeEmail">
                        <form action="{{ route('user.profile.picture') }}" method="post">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="nk-kycfm-upload-box">
                                        {{-- <div class="upload-zone  {{ $errors->has('profile_image') ? 'is-invalid' : '' }}" id="profile_image-dropzone"> --}}
                                        <div class="needsclick dropzone  {{ $errors->has('profile_image') ? 'is-invalid' : '' }}" id="profile_image-dropzone">
                                            <div class="dz-message" data-dz-message="">
                                                <span class="dz-message-text">Drag and drop file</span>
                                                <span class="dz-message-or">or</span>
                                                <span class="dz-message-text">Click Here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" href="#" class="btn btn-lg btn-primary">Upload Picture</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="changeEmail">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>

            <div class="modal-body modal-body-lg">
                <h5 class="title">Security Settings</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#changeEmail">Change Email</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="changeEmail">
                        <form action="{{ route('user.profile.email') }}" method="post">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }}" name="email" id="email" required placeholder="Enter new email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" href="#" class="btn btn-lg btn-primary">Change Email</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="changePassword">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>

            <div class="modal-body modal-body-lg">
                <h5 class="title">Security Settings</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#changePassword">Change Password</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="changePassword">
                        <form action="{{ route('user.profile.password') }}" method="post">
                            <div class="row gy-4">
                                @csrf
                                <input type="hidden" name="email" value="{{ $user->email }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="password">New Password</label>
                                        <input type="password" class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" required placeholder="Enter new password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" required placeholder="Enter confirm new password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-lg btn-primary">Change Password</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    Dropzone.options.profileImageDropzone = {
    url: '{{ route('user.profile.storeMedia') }}',
    maxFilesize: 30, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
      width: 4000,
      height: 4000
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
    @if(isset($user) && $user->profile_image)
        var file = {!! json_encode($user->profile_image) !!}
            this.options.addedfile.call(this, file)
        this.options.thumbnail.call(this, file, '{{ $user->profile_image->getUrl('thumb') }}')
        file.previewElement.classList.add('dz-complete')
        $('form').append('<input type="hidden" name="profile_image" value="' + file.file_name + '">')
        this.options.maxFiles = this.options.maxFiles - 1
    @endif
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
@endsection
