@can('loan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.loans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.loan.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.loan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-customerLoans">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.loan_exist') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.loan_exist_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.loan_exist_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.purpose_of_loan') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.repayment_option') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.loan_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.loan_duration') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.interest') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.viewed') }}
                        </th>
                        <th>
                            {{ trans('cruds.loan.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $key => $loan)
                        <tr data-entry-id="{{ $loan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $loan->id ?? '' }}
                            </td>
                            <td>
                                {{ $loan->customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Loan::LOAN_EXIST_SELECT[$loan->loan_exist] ?? '' }}
                            </td>
                            <td>
                                {{ App\Loan::LOAN_EXIST_TYPE_SELECT[$loan->loan_exist_type] ?? '' }}
                            </td>
                            <td>
                                {{ $loan->loan_exist_amount ?? '' }}
                            </td>
                            <td>
                                {{ App\Loan::PURPOSE_OF_LOAN_SELECT[$loan->purpose_of_loan] ?? '' }}
                            </td>
                            <td>
                                {{ App\Loan::REPAYMENT_OPTION_SELECT[$loan->repayment_option] ?? '' }}
                            </td>
                            <td>
                                {{ $loan->loan_amount ?? '' }}
                            </td>
                            <td>
                                {{ $loan->loan_duration ?? '' }}
                            </td>
                            <td>
                                {{ $loan->interest ?? '' }}
                            </td>
                            <td>
                                {{ $loan->total ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $loan->viewed ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $loan->viewed ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ App\Loan::STATUS_SELECT[$loan->status] ?? '' }}
                            </td>
                            <td>
                                @can('loan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.loans.show', $loan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('loan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.loans.edit', $loan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('loan_delete')
                                    <form action="{{ route('admin.loans.destroy', $loan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('loan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.loans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-customerLoans:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection