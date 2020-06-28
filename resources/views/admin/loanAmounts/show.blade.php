@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.loanAmount.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loan-amounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.id') }}
                        </th>
                        <td>
                            {{ $loanAmount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.loan') }}
                        </th>
                        <td>
                            {{ $loanAmount->loan->viewed ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.sub_total') }}
                        </th>
                        <td>
                            {{ $loanAmount->sub_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.interest') }}
                        </th>
                        <td>
                            {{ $loanAmount->interest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.total') }}
                        </th>
                        <td>
                            {{ $loanAmount->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.paid') }}
                        </th>
                        <td>
                            {{ $loanAmount->paid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.balance') }}
                        </th>
                        <td>
                            {{ $loanAmount->balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.loan_date') }}
                        </th>
                        <td>
                            {{ $loanAmount->loan_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loanAmount.fields.due_date') }}
                        </th>
                        <td>
                            {{ $loanAmount->due_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loan-amounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection