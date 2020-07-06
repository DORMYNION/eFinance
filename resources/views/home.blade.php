@extends('layouts.admin')
@section('content')
@section('breadcrumb', 'Dashboard')
<div class="content">

    <div class="row">
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-info">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1>{{ number_format($settings1['total_number']) }}</h1></div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ $settings1['chart_title'] }}</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-success">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1>{{ number_format($settings2['total_number']) }}</h1></div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ $settings2['chart_title'] }}</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-warning">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1>{{ number_format($settings3['total_number']) }}</h1></div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ $settings3['chart_title'] }}</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1>{{ number_format($settings4['total_number']) }}</h1></div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ $settings4['chart_title'] }}</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-danger">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1>{{ number_format($settings5['total_number']) }}</h1></div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ $settings5['chart_title'] }}</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-gradient-info">
                <div class="card-body">
                    <div class="text-muted text-right mb-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-value-lg"><h1>{{ number_format($settings6['total_number']) }}</h1></div>
                    <small class="text-muted text-uppercase font-weight-bold">{{ $settings6['chart_title'] }}</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold h5">Latest loan applications</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-hover table-outline mb-0 datatable datatable-Dashboard">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"><i class="fa fa-picture-o"></i></th>
                                <th>{{ trans('cruds.loan.fields.date_apply') }}</th>
                                <th>{{ trans('cruds.customer.fields.full_name') }}</th>
                                <th>{{ trans('cruds.customer.fields.mobile_no_1') }}</th>
                                <th>{{ trans('cruds.customer.fields.email') }}</th>
                                <th>{{ trans('cruds.loan.fields.loan_amount') }}</th>
                                <th>{{ trans('cruds.loan.fields.status') }}</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $key => $loan)
                                @php
                                    $sate_join = strtotime($loan->created_at);
                                    $date_join = date('F d, Y H:i:sa', $sate_join);
                                @endphp
                                <tr  data-entry-id="{{ $loan->id }}">
                                    <td class="text-center">
                                        <div class="c-avatar"><img src="{{ asset('img/profile/default.png') }}" alt="" class="c-avatar-img"></div>
                                    </td>
                                    <td>{{ $date_join }}</td>
                                    <td>
                                        <a class="text-dark" href="{{ route('admin.customers.show', $loan->customer->id) }}">
                                            {{ $loan->customer->first_name ?? '' }} {{ $loan->customer->last_name ?? '' }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="{{ route('admin.customers.show', $loan->customer->id) }}">
                                            {{ $loan->customer->mobile_no_1 ?? '' }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="{{ route('admin.customers.show', $loan->customer->id) }}">
                                            {{ $loan->customer->email ?? '' }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="{{ route('admin.customers.show', $loan->customer->id) }}">
                                            {{ $loan->loan_amount ?? '' }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="{{ route('admin.customers.show', $loan->customer->id) }}">
                                            {{ App\Loan::STATUS_SELECT[$loan->status] ?? '' }}
                                        </a>
                                    </td>
                                    <td>
                                        @can('loan_show')
                                            <a class="btn btn-xs btn-success" href="{{ route('admin.customers.show', $loan->customer->id) }}">
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
    let table = $('.datatable-Dashboard:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    
    })

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection