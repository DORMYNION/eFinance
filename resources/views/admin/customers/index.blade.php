@extends('layouts.admin')
@section('content')
@section('breadcrumb', 'All Users')
@can('customer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{-- <a class="btn btn-success" href="{{ route('admin.customers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.customer.title_singular') }}
            </a> --}}
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.customer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-Customer">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center"><i class="fa fa-picture-o"></i></th>
                        <th>
                            {{ trans('cruds.customer.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.mobile_no_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.date_join') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key => $customer)
                        @php
                            $sate_join = strtotime($customer->created_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
                        @endphp
                        <tr data-entry-id="{{ $customer->id }}">
                            <td class="text-center">
                                <div class="c-avatar"><img src="{{ asset('img/profile/default.png') }}" alt="" class="c-avatar-img"></div>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.customers.show', $customer->id) }}">
                                    {{ $customer->first_name ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.customers.show', $customer->id) }}">
                                    {{ $customer->last_name ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.customers.show', $customer->id) }}">
                                    {{ $customer->mobile_no_1 ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.customers.show', $customer->id) }}">
                                    {{ $customer->email ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.customers.show', $customer->id) }}">
                                    {{ $date_join ?? '' }}
                                </a>
                            </td>
                            <td>
                                @can('customer_show')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.customers.show', $customer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


    $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 1, 'desc' ]],
        pageLength: 50,
    });
    let table = $('.datatable-Customer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    
    })

</script>
@endsection