@extends('layouts.apply')
@section('styles')
<style scoped>
    .isVisible {
    display:block;
    }
    .notVisible {
    display:none;
    }
</style>
@endsection
@section('content')
<div id="tracker">
    <div id="trackitemcont">
        <div id="trackitemtop">
            <div id="trackitemtopleft" style="border:0px;"></div>
            <div id="trackitemtopmiddle">
                <a><i id="icon1" class="fas fa-dot-circle whitetext" @click="moveNext('step2', 'icon1')"></i></a>
            </div>
            <div id="trackitemtopright"></div>
        </div><!--trackitemtop-->
        <div id="text1" class="trackitembottom whitetext">Verify Your BVN</div><!--trackitembottom-->
    </div><!--trackitemcont-->

    <div id="trackitemcont">
        <div id="trackitemtop">
            <div id="trackitemtopleft"></div>
            <div id="trackitemtopmiddle"><a href="#"><i id="icon2" class="fas fa-dot-circle"></i></a></div>
            <div id="trackitemtopright"></div>
        </div><!--trackitemtop-->
        <div id="text2" class="trackitembottom">Personal Details</div><!--trackitembottom-->
    </div><!--trackitemcont-->

    <div id="trackitemcont">
        <div id="trackitemtop">
            <div id="trackitemtopleft"></div>
            <div id="trackitemtopmiddle"><a href="#"><i id="icon3" class="fas fa-dot-circle"></i></a></div>
            <div id="trackitemtopright"></div>
        </div><!--trackitemtop-->
        <div id="text3" class="trackitembottom">Your Contacts</div><!--trackitembottom-->
    </div><!--trackitemcont-->

    <div id="trackitemcont">
        <div id="trackitemtop">
            <div id="trackitemtopleft"></div>
            <div id="trackitemtopmiddle"><a href="#"><i id="icon4" class="fas fa-dot-circle"></i></a></div>
            <div id="trackitemtopright"></div>
        </div><!--trackitemtop-->
        <div id="text4" class="trackitembottom">Your Employment</div><!--trackitembottom-->
    </div><!--trackitemcont-->

    <div id="trackitemcont">
        <div id="trackitemtop">
            <div id="trackitemtopleft"></div>
            <div id="trackitemtopmiddle"><a href="#"><i id="icon5" class="fas fa-dot-circle"></i></a></div>
            <div id="trackitemtopright" style="border:0px;"></div>
        </div><!--trackitemtop-->
        <div id="text5" class="trackitembottom">Your Loan</div><!--trackitembottom-->
    </div><!--trackitemcont-->
</div><!--tracker-->

<div id="subheading" v-html="cont">
    
</div>

<section id="applySection">
    <div class="container">
        <div class="row">
            <div class="col">
                <form id="myForm" method="POST" action="{{ route("apply.store") }}" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- BVN Section--> 
                    <div id="step1" class="isVisible">
                        <div class="form-group">
                            <label class="sr-only required" for="bvn">{{ trans('cruds.customer.fields.bvn') }}</label>
                            <input class="form-control {{ $errors->has('bvn') ? 'is-invalid' : '' }} px-5" type="number" name="bvn" id="bvn" value="{{ old('bvn', '') }}" step="1" placeholder="Bank Verification Number (BVN)" required>
                            @if($errors->has('bvn'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bvn') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.bvn_helper') }}</span>
                        </div>
    
                        <div class="form-group d-flex justify-content-md-end mt-5">
                            <button class="btn btn-success btn-lg mb-2" type="submit" >
                                {{ trans('global.continue') }}
                            </button>
                        </div>
                    </div>
                    <!-- BVN Section-->

                    <!-- Personal Section-->
                    <div id="step2" class="isVisible">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.title') }}</label>
                                <select class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" required>
                                    <option value disabled {{ old('title', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::TITLE_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('title', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.title_helper') }}</span>
                            </div>
    
                            <div class="form-group col-md-4">
                                <label class="required" for="first_name">{{ trans('cruds.customer.fields.first_name') }}</label>
                                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" readonly required>
                                @if($errors->has('first_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.first_name_helper') }}</span>
                            </div>
    
                            <div class="form-group col-md-4">
                                <label class="required" for="last_name">{{ trans('cruds.customer.fields.last_name') }}</label>
                                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" readonly required>
                                @if($errors->has('last_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.last_name_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.gender') }}</label>
                                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::GENDER_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('gender'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.gender_helper') }}</span>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="required" for="date_of_birth">{{ trans('cruds.customer.fields.date_of_birth') }}</label>
                                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" readonly required>
                                @if($errors->has('date_of_birth'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('date_of_birth') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.date_of_birth_helper') }}</span>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.marital_status') }}</label>
                                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status" required>
                                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::MARITAL_STATUS_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('marital_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('marital_status'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('marital_status') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.marital_status_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-md-between mt-5">
                            <button class="btn btn-success btn-lg mb-2" type="button" onclick="showPrev('step1', 'step2', 'icon1', 'icon2', 'text1')">
                                {!! trans('pagination.previous') !!}
                            </button>
                            
                            <button class="btn btn-success btn-lg mb-2" type="submit" onclick="showNext('step2', 'step3', 'icon2', 'icon3', 'text2')">
                                {!! trans('pagination.next') !!}
                            </button>
                        </div>
                    </div>
                    <!-- Personal Section-->

                    <!-- Contact Section-->
                    <div id="step3" class="isVisible">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required" for="mobile_no_1">{{ trans('cruds.customer.fields.mobile_no_1') }}</label>
                                <input class="form-control {{ $errors->has('mobile_no_1') ? 'is-invalid' : '' }}" type="text" name="mobile_no_1" id="mobile_no_1" value="{{ old('mobile_no_1', '') }}" required>
                                @if($errors->has('mobile_no_1'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_no_1') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.mobile_no_1_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile_no_2">{{ trans('cruds.customer.fields.mobile_no_2') }}</label>
                                <input class="form-control {{ $errors->has('mobile_no_2') ? 'is-invalid' : '' }}" type="text" name="mobile_no_2" id="mobile_no_2" value="{{ old('mobile_no_2', '') }}">
                                @if($errors->has('mobile_no_2'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_no_2') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.mobile_no_2_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="email">{{ trans('cruds.customer.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label class="required" for="address">{{ trans('cruds.customer.fields.address') }}</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                                @if($errors->has('address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.address_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="land_mark">{{ trans('cruds.customer.fields.land_mark') }}</label>
                                <input class="form-control {{ $errors->has('land_mark') ? 'is-invalid' : '' }}" type="text" name="land_mark" id="land_mark" value="{{ old('land_mark', '') }}" required>
                                @if($errors->has('land_mark'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('land_mark') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.land_mark_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.state_of_residence') }}</label>
                                <select class="form-control {{ $errors->has('state_of_residence') ? 'is-invalid' : '' }}" name="state_of_residence" id="state_of_residence" required>
                                    <option value disabled {{ old('state_of_residence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::STATE_OF_RESIDENCE_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('state_of_residence', 'Lagos') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('state_of_residence'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('state_of_residence') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.state_of_residence_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.local_government_area_of_residence') }}</label>
                                <select class="form-control {{ $errors->has('local_government_area_of_residence') ? 'is-invalid' : '' }}" name="local_government_area_of_residence" id="local_government_area_of_residence" required>
                                    <option value disabled {{ old('local_government_area_of_residence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('local_government_area_of_residence', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('local_government_area_of_residence'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('local_government_area_of_residence') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.local_government_area_of_residence_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.status_of_residence') }}</label>
                                <select class="form-control {{ $errors->has('status_of_residence') ? 'is-invalid' : '' }}" name="status_of_residence" id="status_of_residence" required>
                                    <option value disabled {{ old('status_of_residence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::STATUS_OF_RESIDENCE_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('status_of_residence', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('status_of_residence'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('status_of_residence') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.status_of_residence_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-md-between mt-5">
                            <button class="btn btn-success btn-lg mb-2" type="button">
                                {!! trans('pagination.previous') !!}
                            </button>
                            
                            <button class="btn btn-success btn-lg mb-2" type="submit">
                                {!! trans('pagination.next') !!}
                            </button>
                        </div>
                    </div>
                    <!-- Contact Section-->

                    <!-- Employment Section-->
                    <div id="step4" class="isVisible">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required" for="monthly_income">{{ trans('cruds.customer.fields.monthly_income') }}</label>
                                <input class="form-control {{ $errors->has('monthly_income') ? 'is-invalid' : '' }}" type="number" name="monthly_income" id="monthly_income" value="{{ old('monthly_income', '') }}" step="0.01" required>
                                @if($errors->has('monthly_income'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('monthly_income') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.monthly_income_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.employment_sector') }}</label>
                                <select class="form-control {{ $errors->has('employment_sector') ? 'is-invalid' : '' }}" name="employment_sector" id="employment_sector" required>
                                    <option value disabled {{ old('employment_sector', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::EMPLOYMENT_SECTOR_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('employment_sector', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('employment_sector'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('employment_sector') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.employment_sector_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="employers_name">{{ trans('cruds.customer.fields.employers_name') }}</label>
                                <input class="form-control {{ $errors->has('employers_name') ? 'is-invalid' : '' }}" type="text" name="employers_name" id="employers_name" value="{{ old('employers_name', '') }}" required>
                                @if($errors->has('employers_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('employers_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.employers_name_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required" for="employers_address">{{ trans('cruds.customer.fields.employers_address') }}</label>
                                <input class="form-control {{ $errors->has('employers_address') ? 'is-invalid' : '' }}" type="text" name="employers_address" id="employers_address" value="{{ old('employers_address', '') }}" required>
                                @if($errors->has('employers_address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('employers_address') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.employers_address_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="employers_land_mark">{{ trans('cruds.customer.fields.employers_land_mark') }}</label>
                                <input class="form-control {{ $errors->has('employers_land_mark') ? 'is-invalid' : '' }}" type="text" name="employers_land_mark" id="employers_land_mark" value="{{ old('employers_land_mark', '') }}" required>
                                @if($errors->has('employers_land_mark'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('employers_land_mark') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.employers_land_mark_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.employers_state') }}</label>
                                <select class="form-control {{ $errors->has('employers_state') ? 'is-invalid' : '' }}" name="employers_state" id="employers_state" required>
                                    <option value disabled {{ old('employers_state', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::EMPLOYERS_STATE_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('employers_state', 'Lagos') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('employers_state'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('employers_state') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.employers_state_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="required">{{ trans('cruds.customer.fields.employers_local_government_area') }}</label>
                                <select class="form-control {{ $errors->has('employers_local_government_area') ? 'is-invalid' : '' }}" name="employers_local_government_area" id="employers_local_government_area" required>
                                    <option value disabled {{ old('employers_local_government_area', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('employers_local_government_area', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('employers_local_government_area'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('employers_local_government_area') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.employers_local_government_area_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-md-between mt-5">
                            <button class="btn btn-success btn-lg mb-2" type="button">
                                {!! trans('pagination.previous') !!}
                            </button>
                            
                            <button class="btn btn-success btn-lg mb-2" type="submit">
                                {!! trans('pagination.next') !!}
                            </button>
                        </div>
                    </div>
                    <!-- Employment Section-->

                    <!-- Loan Section-->
                    <div id="step5" class="isVisible">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.customer.fields.bank_name') }}</label>
                                <select class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" name="bank_name" id="bank_name" required>
                                    <option value disabled {{ old('bank_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Customer::BANK_NAME_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('bank_name', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('bank_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bank_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.bank_name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="account_name">{{ trans('cruds.customer.fields.account_name') }}</label>
                                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}" required>
                                @if($errors->has('account_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('account_name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.account_name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="account_no">{{ trans('cruds.customer.fields.account_no') }}</label>
                                <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ old('account_no', '') }}" required>
                                @if($errors->has('account_no'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('account_no') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.account_no_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.loan.fields.loan_exist') }}</label>
                                <select class="form-control {{ $errors->has('loan_exist') ? 'is-invalid' : '' }}" name="loan_exist" id="loan_exist" required>
                                    <option value disabled {{ old('loan_exist', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Loan::LOAN_EXIST_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('loan_exist', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('loan_exist'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('loan_exist') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.loan_exist_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>{{ trans('cruds.loan.fields.loan_exist_type') }}</label>
                                <select class="form-control {{ $errors->has('loan_exist_type') ? 'is-invalid' : '' }}" name="loan_exist_type" id="loan_exist_type">
                                    <option value disabled {{ old('loan_exist_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Loan::LOAN_EXIST_TYPE_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('loan_exist_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('loan_exist_type'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('loan_exist_type') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.loan_exist_type_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="loan_exist_amount">{{ trans('cruds.loan.fields.loan_exist_amount') }}</label>
                                <input class="form-control {{ $errors->has('loan_exist_amount') ? 'is-invalid' : '' }}" type="number" name="loan_exist_amount" id="loan_exist_amount" value="{{ old('loan_exist_amount', '') }}" step="0.01">
                                @if($errors->has('loan_exist_amount'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('loan_exist_amount') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.loan_exist_amount_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.loan.fields.purpose_of_loan') }}</label>
                                <select class="form-control {{ $errors->has('purpose_of_loan') ? 'is-invalid' : '' }}" name="purpose_of_loan" id="purpose_of_loan" required>
                                    <option value disabled {{ old('purpose_of_loan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Loan::PURPOSE_OF_LOAN_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('purpose_of_loan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('purpose_of_loan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('purpose_of_loan') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.purpose_of_loan_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">{{ trans('cruds.loan.fields.repayment_option') }}</label>
                                <select class="form-control {{ $errors->has('repayment_option') ? 'is-invalid' : '' }}" name="repayment_option" id="repayment_option" required>
                                    <option value disabled {{ old('repayment_option', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Loan::REPAYMENT_OPTION_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('repayment_option', 'Monthly') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('repayment_option'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('repayment_option') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.repayment_option_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="bvn">{{ trans('cruds.customer.fields.bvn') }}</label>
                                <input class="form-control {{ $errors->has('bvn') ? 'is-invalid' : '' }} px-5" type="number" name="bvn" id="bvn" value="{{ old('bvn', '') }}" step="1" placeholder="Bank Verification Number (BVN)" required>
                                @if($errors->has('bvn'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bvn') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.customer.fields.bvn_helper') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="required" for="loan_amount">{{ trans('cruds.loan.fields.loan_amount') }}</label>
                                <input class="form-control {{ $errors->has('loan_amount') ? 'is-invalid' : '' }}" type="number" name="loan_amount" id="loan_amount" value="{{ old('loan_amount', '') }}" step="0.01" required>
                                @if($errors->has('loan_amount'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('loan_amount') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.loan_amount_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required" for="loan_duration">{{ trans('cruds.loan.fields.loan_duration') }}</label>
                                <input class="form-control {{ $errors->has('loan_duration') ? 'is-invalid' : '' }}" type="number" name="loan_duration" id="loan_duration" value="{{ old('loan_duration', '') }}" step="1" required>
                                @if($errors->has('loan_duration'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('loan_duration') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.loan_duration_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-md-between mt-5">
                            <button class="btn btn-success btn-lg mb-2" type="button">
                                {!! trans('pagination.previous') !!}
                            </button>
                            
                            <button class="btn btn-success btn-lg mb-2" type="submit">
                                {!! trans('global.submit') !!}
                            </button>
                        </div>
                    </div>
                    <!-- Loan Section-->

                </form>
            </div>
        </div>
    </div>
</section>



{{-- <div id="loanapplicationcont">
    <form action="" role="form" method="post">
        <!-- BVN Section-->
        <div id="step1" class="isVisible">
            <div class="formrow"  style="margin-top:30px;">
                <input 
                    type="text" 
                    class="biginputbox" 
                    id="bvn" 
                    v-model="bvn" 
                    required length="10" 
                    placeholder="Bank Verification Number (BVN)" 
                    @keypress="isNumberKey($event)" required
                >
            </div>
                <div v-if="msgError.bvn" class="invalid-feedback">
                    {{ msgError.bvn }}
                </div>

            <div class="continuecont" style="margin-top:30px;">
                <button 
                    id="next" 
                    class="continuebutton next"
                    :disabled="isDisableBvn"
                    @click="getBvnDetail(bvn)"
                >Continue</button>
                <button 
                    id="check" 
                    class="continuebutton next isVisible"
                    @click="getBvnDetail(bvn)"
                >check</button>
            </div>
        </div>
        <!-- BVN Section-->

        <!-- Personal Section-->
        <div id="step2" class="step notVisible">
            <div class="formrow"  style="padding-top:40px;">
                <label class="mylabelstyle" for="title">Title</label>
                <label class="mylabelstyle" for="fname">First name</label>
                <label class="mylabelstyle" for="lname">Last name</label>
            </div>

            <div class="formrow"  style="padding-top:5px;">
                <select class="smallselect"  id="title" v-model="title" required>
                    <option selected disabled value="">Select Title...</option>
                    <option v-for="title in titles" :value="title">{{ title }}</option>
                </select>
                <input type="text" class="smallinputbox" id="fname" v-model="fname" required="required" placeholder="Enter First Name" readonly>
                <input type="text" class="smallinputbox" id="lname" v-model="lname" required="required" placeholder="Enter Last Name" readonly>
            </div>

            <div class="formrow" style="padding-top:20px;">
                <label class="mylabelstyle" for="gender">Gender</label>
                <label class="mylabelstyle" for="dob">Date of Birth</label>
                <label class="mylabelstyle" for="mstatus">Marital Status</label>
            </div>

            <div class="formrow"  style="padding-top:5px;">
                <select class="smallselect"  id="gender" v-model="gender" required>
                    <option selected disabled value="">Select Gender...</option>
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <input type="text" class="smallinputbox" id="dob" v-model="dob" required="required" placeholder="Enter Date of Birth" readonly>
                <select class="smallselect"  id="mstatus" v-model="mstatus" required>
                    <option selected disabled value="">Select Marital Status...</option>
                    <option selected value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Seperated/Divorced">Seperated/Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>

            <div class="continuecont" style="margin-top:60px;">
                <button 
                    id="prev0" 
                    class="backbutton prev"
                    @click="showPrev('step1', 'step2', 'icon1', 'icon2', 'text1')"
                >Back</button>
                <button 
                    id="next0" 
                    class="continuebutton next"
                    :disabled="isDisablePersonal"
                    @click="showNext('step2', 'step3', 'icon2', 'icon3', 'text2')"
                >Continue</button>
            </div>
        </div>
        <!-- Personal Section-->

        <!-- Contact Section-->
        <div id="step3" class="step notVisible" >
            <div class="formrow" style="padding-top:40px;">
                <label class="mylabelstyle" for="mobile">Mobile Number</label>
                <label class="mylabelstyle" for="office">Office Number</label>
                <label class="mylabelstyle" for="email">Email Address</label>
            </div>

            <div class="formrow" style="padding-top:5px;">
                <input type="tel" class="smallinputbox" id="mobile" v-model="mobile" required="required" placeholder="Enter Mobile Number" readonly="">
                <input type="tel" class="smallinputbox" id="office" v-model="office" required="required" placeholder="Enter Office Number" >
                <input type="email" class="smallinputbox" id="email" v-model="email" required="required" placeholder="Enter Email Address" >
            </div>

            <div class="formrow" style="padding-top:20px;">
                <label class="mylabelstyle" for="address">Home Address</label>
                <label class="mylabelstyle" for="lmark">Land Mark/(Nearest Bus-stop)</label>
            </div>

            <div class="formrow" style="padding-top:5px;">
                <input type="text" class="largeinputbox" id="address" v-model="address" required="required" placeholder="Enter Home Address">
                <input type="text" class="smallinputbox" id="lmark" v-model="lmark" required="required" placeholder="Land Mark/(Nearest Bus-stop)">
            </div>

            <div class="formrow" style="padding-top:20px;">
                <label class="mylabelstyle" for="rstate">State of Residence</label>
                <label class="mylabelstyle" for="rlga">Local Government of Residence</label>
                <label class="mylabelstyle" for="rstatus">Residential Status</label>
            </div>

            <div class="formrow" style="padding-top:5px;">
                <select class="smallselect" id="rstate" v-model="rstate" required>
                    <option selected value="Lagos">Lagos</option>
                </select>
                <select class="smallselect" id="rlga" v-model="rlga" required>
                    <option selected disabled value="">Choose...</option>
                    <option v-for="result in results" :value="result">{{ result }}</option>
                </select>
                <select class="smallselect" id="rstatus" v-model="rstatus" required>
                    <option selected disabled value="">Select Residential Status...</option>
                    <option value="SOCIAL_RENTING">Social Renting</option>
                    <option value="COMMERCIAL_RENTING">Commercial Renting</option>
                    <option value="WITH_RELATIVES">With Relatives</option>
                    <option value="OWNER">Owner</option>
                    <option value="TENANT">Tenant</option>
                    <option value="WITH_PARENTS">With Parents</option>
                    <option value="OTHER">Other</option>
                </select>
            </div>

            <div class="continuecont" style="margin-top:60px;">
                <button 
                    id="prev1" 
                    class="backbutton prev"
                    @click="showPrev('step2', 'step3', 'icon2', 'icon3', 'text2')"
                >Back</button>
                <button 
                    id="next1" 
                    class="continuebutton next"
                    :disabled="isDisableContact"
                    @click="showNext('step3', 'step4', 'icon3', 'icon4', 'text3')"
                >Continue</button>
            </div>
        </div>
        <!-- Contact Section-->

        <!-- Employment Section-->
        <div id="step4" class="step notVisible">
            <div class="formrow" style="padding-top:40px">
                <label class="mylabelstyle" for="payday">Pay Date(DD)</label>
                <label class="mylabelstyle" for="mincome">Net Monthly Income</label>
                <label class="mylabelstyle" for="esector">Employment Sector</label>
            </div>

            <div class="formrow" style="padding-top:5px">
                <select class="smallselect" id="payday" v-model="payday" required>
                    <option selected disabled value="">Select Payday...</option>
                    <option v-for="n in 31" :value="n">{{ n }}</option>
                </select>
                <select class="smallselect" id="mincome" v-model="mincome" required>
                    <option selected disabled value="">Select Monthly Income...</option>
                    <option value="N101,000.00-N300,000.00">N101,000.00 -N300,000.00</option>
                    <option value="N301,000.00–N500,000.00">N301,000.00 – N500,000.00</option>
                    <option value="N501,000.00–N700,000.00">N501,000.00 – N700,000.00</option>
                    <option value="N701,000.00–N1,000,000.00">N701,000.00 – N1,000,000.00</option>
                    <option value="Above N1,000,000.00">Above N1,000,000.00 </option>
                </select>
                <select class="smallselect" id="esector" v-model="esector" required>
                    <option selected disabled value="">Select Employment Sector...</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Manufacturing">Manufacturing</option>
                    <option value="Retail/Sales">Retail/Sales</option>
                    <option value="Construction">Construction</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Telecoms">Telecoms</option>
                    <option value="Oil &amp; Gas">Oil &amp; Gas</option>
                    <option value="Power">Power</option>
                    <option value="Banking">Banking</option>
                    <option value="Other Financial Services">Other Financial Services</option>
                    <option value="Others">Others</option>
                    <option value="Health">Health</option>
                    <option value="Government">Government</option>
                </select>
            </div>

            <div class="formrow" style="padding-top:20px">
                <label class="mylabelstyle" for="empname">Employer's Name</label>
                <label class="mylabelstyle" for="empaddress">Employment Address</label>
                <label class="mylabelstyle" for="emplmark">Land Mark/(Nearest Bus-stop)</label>
            </div>

            <div class="formrow" style="padding-top:5px">
                <input type="text" class="smallinputbox" id="empname" v-model="empname" required="required" placeholder="Enter Employer's Name">
                <input type="text" class="smallinputbox" id="empaddress" v-model="empaddress" required="required" placeholder="Enter Employment Address">
                <input type="text" class="smallinputbox" id="emplmark" v-model="emplmark" required="required" placeholder="Enter Land Mark/(Nearest Bus-stop)">
            </div>

            <div class="formrow" style="padding-top:20px">
                <label class="mylabelstyle" for="empstate">State of Employment</label>
                <label class="mylabelstyle" for="empaddress">Local Government</label>
                <label for="title" class="mylabelstyle"></label>
            </div>

            <div class="formrow" style="padding-top:5px">
                <select class="smallselect" id="empstate" v-model="empstate" required>
                    <option selected value="Lagos">Lagos</option>
                </select>
                <select class="smallselect" id="emplga" v-model="emplga" required>
                    <option selected disabled value="">Choose...</option>
                    <option v-for="result in results" :value="result">{{ result }}</option>
                </select>
                <div class="smallemptybox"></div>
            </div>

            <div class="continuecont" style="margin-top:60px;">
                <button 
                    id="prev2" 
                    class="backbutton prev"
                    @click="showPrev('step3', 'step4', 'icon3', 'icon4', 'text3')">
                    Back
                </button>
                <button 
                    id="next2" 
                    class="continuebutton next"
                    :disabled="isDisableEmployment"
                    @click="showNext('step4', 'step5', 'icon4', 'icon5', 'text4')">
                    Continue
                </button>
            </div>
        </div>
        <!-- Employment Section-->

        <!-- Loan Section-->
        <div id="step5" class="step notVisible">
            <div class="formrow" style="padding-top:40px">
                <label class="mylabelstyle" for="bname">Bank Name</label>
                <label class="mylabelstyle" for="accnumber">Account Number</label>
                <label class="mylabelstyle" for="accname">Account Name</label>
            </div>

            <div class="formrow" style="padding-top:5px">
                <select class="smallselect" id="bname" v-model="bname" required>
                    <option selected disabled value="">Select Purpose of Loan</option>
                    <option v-for="bankName in bankNames" :value="bankName.name">{{ bankName.name }}</option>
                </select>
                <!-- <input type="text" class="smallinputbox" id="bname" v-model="bname" required="required" placeholder="Enter Bank Name"> -->
                <input type="number" class="smallinputbox" id="accnumber" v-model="accnumber" required="required" placeholder="Enter Account Number">
                <input type="text" class="smallinputbox" id="accname" v-model="accname" required="required" placeholder="Enter Account Name">
            </div>

            <div class="formrow" style="padding-top:20px">
                <label class="mylabelstyle" for="bvn">Bank Verification Number (BVN)</label>
                <label class="mylabelstyle" for="ploan">Purpose of Loan</label>
                <label class="mylabelstyle" for="roption">Repayment Option</label>
            </div>

            <div class="formrow" style="padding-top:5px">
                <input type="number" class="smallinputbox" id="bvn" v-model="bvn" required="required" placeholder="Enter Bank Verification Number (BVN)" readonly>
                <select class="smallselect" id="ploan" v-model="ploan" required>
                    <option selected disabled value="">Select Purpose of Loan</option>
                    <option value="Portable Goods">Portable Goods</option>
                    <option value="Travel/Holiday">Travel/Holiday</option>
                    <option value="School Fees">School Fees</option>
                    <option value="Rent">Rent</option>
                    <option value="Household Maintenance">Household Maintenance</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Medical">Medical</option>
                    <option value="Wedding/Events">Wedding/Events</option>
                    <option value="Other Expenses">Other Expenses</option>
                </select>
                <select class="smallselect" id="roption" v-model="roption" required>
                    <option selected disabled value="">Select Repayment Option</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Bullet">Bullet</option>
                </select>
            </div>

            <div class="formrow" style="padding-top:20px">
                <label class="mylabelstyle" for="lexist">Any Existing Loans</label>
                <label class="mylabelstyle" for="lexist">If YES Please Specify:</label>
                <label class="mylabelstyle" for="eamount">If YES State Rapayt. Amount:</label>
            </div>

            <div class="formrow" style="padding-top:5px">
                <select class="smallselect" id="lexist" v-model="lexist" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
                <select class="smallselect" id="lexisttype" v-model="lexisttype" required>
                    <option selected disabled value="">Select Existing Loan Type...</option>
                    <option value="Mortgage">Mortgage</option>
                    <option value="Overdraft">Overdraft</option>
                    <option value="Business">Business</option>
                    <option value="Car Loan">Car Loan</option>
                    <option value="Personal Loan">Personal Loan</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
                <input type="money" class="smallinputbox" id="eamount" v-model="eamount" required="required" placeholder="Enter If YES State Rapayt. Amount:">
            </div>

            <div class="formrow" style="padding-top:20px">
                <label class="mylabelstyle">Loan Amount</label>
            </div>
            <div class="formrow" style="padding-top:5px">
                <input class="slider" type="range" name="amount" value="100000" id="amount" min="100000" max="2000000" step="10000">
            </div>
            <div class="formrow">
                <p>Vaule: <span id="vamount"></span></p>
            </div>

            <div class="formrow" style="padding-top:20px">
                <label class="mylabelstyle">Loan Duration (month(s))</label>
            </div>
            <div class="formrow" style="padding:5px">
                <input class="slider" type="range" name="days" value="3" id="days" min="1" max="9" step="1">
            </div>
            <div class="formrow">
                <p>Vaule: <span id="vdays"></span></p>
            </div>
            <div class="formrow">
                <h4 style="color:#006400;">Loan <span id="disp-Loan"></span> Charges <span id="disp-Charges"></span> Total <span id="disp-Total"></span></h4>
            </div>

            <div class="continuecont" style="margin-top:60px;">
                <button
                    id="prev3" 
                    class="backbutton prev"
                    @click="showPrev('step4', 'step5', 'icon4', 'icon5', 'text3')"
                >Back</button>
                <button
                    id="next3" 
                    class="continuebutton next"
                    :disabled="isDisableLoan"
                    @click="alert()"
                >Apply</button>
            </div>
        </div>
        <!-- Loan Section-->
        
    </form>

</div><!--loanapplicationcont--> --}}


</div><!--myinner-->
@endsection
@section('scripts')
@parent

<script>
    $(document).ready(function() {
        console.log('sjdksdhj')

    })
</script>

@endsection