@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.loan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.loans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.loan.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
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
            <div class="form-group">
                <label for="loan_exist_amount">{{ trans('cruds.loan.fields.loan_exist_amount') }}</label>
                <input class="form-control {{ $errors->has('loan_exist_amount') ? 'is-invalid' : '' }}" type="number" name="loan_exist_amount" id="loan_exist_amount" value="{{ old('loan_exist_amount', '') }}" step="0.01">
                @if($errors->has('loan_exist_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_exist_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.loan_exist_amount_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
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
            <div class="form-group">
                <label class="required" for="loan_amount">{{ trans('cruds.loan.fields.loan_amount') }}</label>
                <input class="form-control {{ $errors->has('loan_amount') ? 'is-invalid' : '' }}" type="number" name="loan_amount" id="loan_amount" value="{{ old('loan_amount', '') }}" step="0.01" required>
                @if($errors->has('loan_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.loan_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="loan_duration">{{ trans('cruds.loan.fields.loan_duration') }}</label>
                <input class="form-control {{ $errors->has('loan_duration') ? 'is-invalid' : '' }}" type="number" name="loan_duration" id="loan_duration" value="{{ old('loan_duration', '') }}" step="1" required>
                @if($errors->has('loan_duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.loan_duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="interest">{{ trans('cruds.loan.fields.interest') }}</label>
                <input class="form-control {{ $errors->has('interest') ? 'is-invalid' : '' }}" type="number" name="interest" id="interest" value="{{ old('interest', '') }}" step="0.01" required>
                @if($errors->has('interest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.interest_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.loan.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <select name="status" id="status" required hidden>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Loan::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <select name="customer_type" id="customer_type" required hidden>
                    <option value disabled {{ old('customer_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Loan::CUSTOMER_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('customer_type', 'Old') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
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