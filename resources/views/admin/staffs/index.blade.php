@extends('layouts.admin')
@section('content')

@can('admin')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.staffs.create') }}">
                Add Staff
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Staff List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-Staff">
                <thead class="thead-light">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th> 
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $key => $user)
                        @php
                            $sate_join = strtotime($user->created_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
                        @endphp
                        <tr data-entry-id="{{ $user->id }}">
                            <td>
                                {{ $user->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $user->last_name ?? '' }}
                            </td> 
                            <td>
                                {{ $user->email ?? '' }}
                            </td> 
                            <td>
                                <a class="btn btn-xs btn-success" href="{{ route('admin.staffs.edit', $user->id) }}">
                                    Change Password
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
    pageLength: 25,
  });
  let table = $('.datatable-Staff:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection