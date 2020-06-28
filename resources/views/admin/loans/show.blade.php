@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.loan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.id') }}
                        </th>
                        <td>
                            {{ $loan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.customer') }}
                        </th>
                        <td>
                            {{ $loan->customer->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.loan_exist') }}
                        </th>
                        <td>
                            {{ App\Loan::LOAN_EXIST_SELECT[$loan->loan_exist] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.loan_exist_type') }}
                        </th>
                        <td>
                            {{ App\Loan::LOAN_EXIST_TYPE_SELECT[$loan->loan_exist_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.loan_exist_amount') }}
                        </th>
                        <td>
                            {{ $loan->loan_exist_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.purpose_of_loan') }}
                        </th>
                        <td>
                            {{ App\Loan::PURPOSE_OF_LOAN_SELECT[$loan->purpose_of_loan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.repayment_option') }}
                        </th>
                        <td>
                            {{ App\Loan::REPAYMENT_OPTION_SELECT[$loan->repayment_option] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.loan_amount') }}
                        </th>
                        <td>
                            {{ $loan->loan_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.loan_duration') }}
                        </th>
                        <td>
                            {{ $loan->loan_duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.interest') }}
                        </th>
                        <td>
                            {{ $loan->interest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.total') }}
                        </th>
                        <td>
                            {{ $loan->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.viewed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $loan->viewed ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.status') }}
                        </th>
                        <td>
                            {{ App\Loan::STATUS_SELECT[$loan->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#loan_loan_amounts" role="tab" data-toggle="tab">
                {{ trans('cruds.loanAmount.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="loan_loan_amounts">
            @includeIf('admin.loans.relationships.loanLoanAmounts', ['loanAmounts' => $loan->loanLoanAmounts])
        </div>
    </div>
</div>

@endsection