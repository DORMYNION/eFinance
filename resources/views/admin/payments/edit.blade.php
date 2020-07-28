@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="loan_id">{{ trans('cruds.payment.fields.loan') }}</label>
                <select class="form-control select2 {{ $errors->has('loan') ? 'is-invalid' : '' }}" name="loan_id" id="loan_id" required>
                    @foreach($loans as $id => $loan)
                        <option value="{{ $id }}" {{ ($payment->loan ? $payment->loan->id : old('loan_id')) == $id ? 'selected' : '' }}>{{ $loan }}</option>
                    @endforeach
                </select>
                @if($errors->has('loan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.loan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="loan_amount_id">{{ trans('cruds.payment.fields.loan_amount') }}</label>
                <select class="form-control select2 {{ $errors->has('loan_amount') ? 'is-invalid' : '' }}" name="loan_amount_id" id="loan_amount_id" required>
                    @foreach($loan_amounts as $id => $loan_amount)
                        <option value="{{ $id }}" {{ ($payment->loan_amount ? $payment->loan_amount->id : old('loan_amount_id')) == $id ? 'selected' : '' }}>{{ $loan_amount }}</option>
                    @endforeach
                </select>
                @if($errors->has('loan_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loan_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.loan_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.payment.fields.payment_method') }}</label>
                <select class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method" id="payment_method" required>
                    <option value disabled {{ old('payment_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Payment::PAYMENT_METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_method', $payment->payment_method) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paid_at">{{ trans('cruds.payment.fields.paid_at') }}</label>
                <input class="form-control date {{ $errors->has('paid_at') ? 'is-invalid' : '' }}" type="text" name="paid_at" id="paid_at" value="{{ old('paid_at', $payment->paid_at) }}" required>
                @if($errors->has('paid_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.paid_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transaction">{{ trans('cruds.payment.fields.transaction') }}</label>
                <input class="form-control {{ $errors->has('transaction') ? 'is-invalid' : '' }}" type="text" name="transaction" id="transaction" value="{{ old('transaction', $payment->transaction) }}" required>
                @if($errors->has('transaction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.transaction_helper') }}</span>
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