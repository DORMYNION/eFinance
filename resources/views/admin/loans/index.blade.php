@extends('layouts.admin')
@section('content')
@section('breadcrumb', 'Approved Loans')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.loanAmount.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-LoanAmount">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center"><i class="fa fa-picture-o"></i></th>
                        <th>Date Approved</th>
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
                            $sate_join = strtotime($loan->updated_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
                        @endphp
                        <tr  data-entry-id="{{ $loan->id }}">
                            <td class="text-center">
                                <div class="c-avatar"><img src="{{ asset('img/profile/default.png') }}" alt="" class="c-avatar-img"></div>
                            </td>
                            <td>{{ $date_join }}</td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $loan->user->id) }}">
                                    {{ $loan->user->first_name ?? '' }} {{ $loan->user->last_name ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $loan->user->id) }}">
                                    {{ $loan->user->mobile_no_1 ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $loan->user->id) }}">
                                    {{ $loan->user->email ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $loan->user->id) }}">
                                    {{ $loan->loan_amount ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $loan->user->id) }}">
                                    {{ App\Loan::STATUS_SELECT[$loan->status] ?? '' }}
                                </a>
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.users.show', $loan->user->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
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
    let table = $('.datatable-LoanAmount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    
    })

</script>
@endsection