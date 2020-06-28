@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.loanAmount.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.loan-amounts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="loan_id">{{ trans('cruds.loanAmount.fields.loan') }}</label>
                <select class="form-control select2 {{ $errors->has('loan') ? 'is-invalid' : '' }}" name="loan_id" id="loan_id" required>
                    @foreach($loans as $id => $loan)
                        <option value="{{ $id }}" {{ old('loan_id') == $id ? 'selected' : '' }}>{{ $loan }}</option>
                    @endforeach
                </select>
                @if($errors->has('loan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.loan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_total">{{ trans('cruds.loanAmount.fields.sub_total') }}</label>
                <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="number" name="sub_total" id="sub_total" value="{{ old('sub_total', '') }}" step="0.01" required>
                @if($errors->has('sub_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.sub_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="interest">{{ trans('cruds.loanAmount.fields.interest') }}</label>
                <input class="form-control {{ $errors->has('interest') ? 'is-invalid' : '' }}" type="number" name="interest" id="interest" value="{{ old('interest', '') }}" step="0.01" required>
                @if($errors->has('interest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.interest_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.loanAmount.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid">{{ trans('cruds.loanAmount.fields.paid') }}</label>
                <input class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}" type="number" name="paid" id="paid" value="{{ old('paid', '') }}" step="0.01">
                @if($errors->has('paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="balance">{{ trans('cruds.loanAmount.fields.balance') }}</label>
                <input class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}" type="number" name="balance" id="balance" value="{{ old('balance', '') }}" step="0.01">
                @if($errors->has('balance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('balance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="loan_date">{{ trans('cruds.loanAmount.fields.loan_date') }}</label>
                <input class="form-control date {{ $errors->has('loan_date') ? 'is-invalid' : '' }}" type="text" name="loan_date" id="loan_date" value="{{ old('loan_date') }}" required>
                @if($errors->has('loan_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.loan_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date">{{ trans('cruds.loanAmount.fields.due_date') }}</label>
                <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}">
                @if($errors->has('due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loanAmount.fields.due_date_helper') }}</span>
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