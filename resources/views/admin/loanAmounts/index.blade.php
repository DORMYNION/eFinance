@extends('layouts.admin')
@section('content')
@can('loan_amount_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.loan-amounts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.loanAmount.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.loanAmount.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LoanAmount">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.loan') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.sub_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.interest') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.paid') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.balance') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.loan_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.loanAmount.fields.due_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loanAmounts as $key => $loanAmount)
                        <tr data-entry-id="{{ $loanAmount->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $loanAmount->id ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->loan->viewed ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->sub_total ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->interest ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->total ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->paid ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->balance ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->loan_date ?? '' }}
                            </td>
                            <td>
                                {{ $loanAmount->due_date ?? '' }}
                            </td>
                            <td>
                                @can('loan_amount_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.loan-amounts.show', $loanAmount->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('loan_amount_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.loan-amounts.edit', $loanAmount->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('loan_amount_delete')
                                    <form action="{{ route('admin.loan-amounts.destroy', $loanAmount->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('loan_amount_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.loan-amounts.massDestroy') }}",
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
  let table = $('.datatable-LoanAmount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection