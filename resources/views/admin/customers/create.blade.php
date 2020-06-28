@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="bvn">{{ trans('cruds.customer.fields.bvn') }}</label>
                <input class="form-control {{ $errors->has('bvn') ? 'is-invalid' : '' }}" type="number" name="bvn" id="bvn" value="{{ old('bvn', '') }}" step="1" required>
                @if($errors->has('bvn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bvn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.bvn_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.customer.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.customer.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label class="required" for="date_of_birth">{{ trans('cruds.customer.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @if($errors->has('date_of_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_no_1">{{ trans('cruds.customer.fields.mobile_no_1') }}</label>
                <input class="form-control {{ $errors->has('mobile_no_1') ? 'is-invalid' : '' }}" type="text" name="mobile_no_1" id="mobile_no_1" value="{{ old('mobile_no_1', '') }}" required>
                @if($errors->has('mobile_no_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_no_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.mobile_no_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_no_2">{{ trans('cruds.customer.fields.mobile_no_2') }}</label>
                <input class="form-control {{ $errors->has('mobile_no_2') ? 'is-invalid' : '' }}" type="text" name="mobile_no_2" id="mobile_no_2" value="{{ old('mobile_no_2', '') }}">
                @if($errors->has('mobile_no_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_no_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.mobile_no_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.customer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.customer.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="land_mark">{{ trans('cruds.customer.fields.land_mark') }}</label>
                <input class="form-control {{ $errors->has('land_mark') ? 'is-invalid' : '' }}" type="text" name="land_mark" id="land_mark" value="{{ old('land_mark', '') }}" required>
                @if($errors->has('land_mark'))
                    <div class="invalid-feedback">
                        {{ $errors->first('land_mark') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.land_mark_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
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
            <div class="form-group">
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
            <div class="form-group">
                <label class="required" for="monthly_income">{{ trans('cruds.customer.fields.monthly_income') }}</label>
                <input class="form-control {{ $errors->has('monthly_income') ? 'is-invalid' : '' }}" type="number" name="monthly_income" id="monthly_income" value="{{ old('monthly_income', '') }}" step="0.01" required>
                @if($errors->has('monthly_income'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_income') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.monthly_income_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label class="required" for="employers_name">{{ trans('cruds.customer.fields.employers_name') }}</label>
                <input class="form-control {{ $errors->has('employers_name') ? 'is-invalid' : '' }}" type="text" name="employers_name" id="employers_name" value="{{ old('employers_name', '') }}" required>
                @if($errors->has('employers_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employers_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.employers_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employers_address">{{ trans('cruds.customer.fields.employers_address') }}</label>
                <input class="form-control {{ $errors->has('employers_address') ? 'is-invalid' : '' }}" type="text" name="employers_address" id="employers_address" value="{{ old('employers_address', '') }}" required>
                @if($errors->has('employers_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employers_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.employers_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employers_land_mark">{{ trans('cruds.customer.fields.employers_land_mark') }}</label>
                <input class="form-control {{ $errors->has('employers_land_mark') ? 'is-invalid' : '' }}" type="text" name="employers_land_mark" id="employers_land_mark" value="{{ old('employers_land_mark', '') }}" required>
                @if($errors->has('employers_land_mark'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employers_land_mark') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.employers_land_mark_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
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
            <div class="form-group">
                <label class="required" for="account_name">{{ trans('cruds.customer.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}" required>
                @if($errors->has('account_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.account_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_no">{{ trans('cruds.customer.fields.account_no') }}</label>
                <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ old('account_no', '') }}" required>
                @if($errors->has('account_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.account_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.customer.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Customer::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection