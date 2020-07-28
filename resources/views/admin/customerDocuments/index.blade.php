@extends('layouts.admin')
@section('content')
@can('customer_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.customer-documents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.customerDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.customerDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CustomerDocument">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customerDocument.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerDocument.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerDocument.fields.document_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerDocument.fields.document_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerDocument.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customerDocuments as $key => $customerDocument)
                        <tr data-entry-id="{{ $customerDocument->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $customerDocument->id ?? '' }}
                            </td>
                            <td>
                                {{ $customerDocument->customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ App\CustomerDocument::DOCUMENT_TYPE_SELECT[$customerDocument->document_type] ?? '' }}
                            </td>
                            <td>
                                @if($customerDocument->document_file)
                                    <a href="{{ $customerDocument->document_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $customerDocument->description ?? '' }}
                            </td>
                            <td>
                                @can('customer_document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.customer-documents.show', $customerDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('customer_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.customer-documents.edit', $customerDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('customer_document_delete')
                                    <form action="{{ route('admin.customer-documents.destroy', $customerDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('customer_document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.customer-documents.massDestroy') }}",
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
  let table = $('.datatable-CustomerDocument:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection