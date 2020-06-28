@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.id') }}
                        </th>
                        <td>
                            {{ $customer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.bvn') }}
                        </th>
                        <td>
                            {{ $customer->bvn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.title') }}
                        </th>
                        <td>
                            {{ App\Customer::TITLE_SELECT[$customer->title] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.first_name') }}
                        </th>
                        <td>
                            {{ $customer->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.last_name') }}
                        </th>
                        <td>
                            {{ $customer->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Customer::GENDER_SELECT[$customer->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $customer->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.mobile_no_1') }}
                        </th>
                        <td>
                            {{ $customer->mobile_no_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.mobile_no_2') }}
                        </th>
                        <td>
                            {{ $customer->mobile_no_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.email') }}
                        </th>
                        <td>
                            {{ $customer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.address') }}
                        </th>
                        <td>
                            {{ $customer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.land_mark') }}
                        </th>
                        <td>
                            {{ $customer->land_mark }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.state_of_residence') }}
                        </th>
                        <td>
                            {{ App\Customer::STATE_OF_RESIDENCE_SELECT[$customer->state_of_residence] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.local_government_area_of_residence') }}
                        </th>
                        <td>
                            {{ App\Customer::LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT[$customer->local_government_area_of_residence] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.status_of_residence') }}
                        </th>
                        <td>
                            {{ App\Customer::STATUS_OF_RESIDENCE_SELECT[$customer->status_of_residence] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.monthly_income') }}
                        </th>
                        <td>
                            {{ $customer->monthly_income }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.employment_sector') }}
                        </th>
                        <td>
                            {{ App\Customer::EMPLOYMENT_SECTOR_SELECT[$customer->employment_sector] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.employers_name') }}
                        </th>
                        <td>
                            {{ $customer->employers_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.employers_address') }}
                        </th>
                        <td>
                            {{ $customer->employers_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.employers_land_mark') }}
                        </th>
                        <td>
                            {{ $customer->employers_land_mark }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.employers_state') }}
                        </th>
                        <td>
                            {{ App\Customer::EMPLOYERS_STATE_SELECT[$customer->employers_state] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.employers_local_government_area') }}
                        </th>
                        <td>
                            {{ App\Customer::EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT[$customer->employers_local_government_area] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.profile_image') }}
                        </th>
                        <td>
                            @if($customer->profile_image)
                                <a href="{{ $customer->profile_image->getUrl() }}" target="_blank">
                                    <img src="{{ $customer->profile_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $customer->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.bank_name') }}
                        </th>
                        <td>
                            {{ App\Customer::BANK_NAME_SELECT[$customer->bank_name] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.account_name') }}
                        </th>
                        <td>
                            {{ $customer->account_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.account_no') }}
                        </th>
                        <td>
                            {{ $customer->account_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.status') }}
                        </th>
                        <td>
                            {{ App\Customer::STATUS_SELECT[$customer->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
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
            <a class="nav-link" href="#customer_customer_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.customerDocument.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_customer_notes" role="tab" data-toggle="tab">
                {{ trans('cruds.customerNote.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_loans" role="tab" data-toggle="tab">
                {{ trans('cruds.loan.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="customer_customer_documents">
            @includeIf('admin.customers.relationships.customerCustomerDocuments', ['customerDocuments' => $customer->customerCustomerDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_customer_notes">
            @includeIf('admin.customers.relationships.customerCustomerNotes', ['customerNotes' => $customer->customerCustomerNotes])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_loans">
            @includeIf('admin.customers.relationships.customerLoans', ['loans' => $customer->customerLoans])
        </div>
    </div>
</div>

@endsection