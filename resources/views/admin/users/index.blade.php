@extends('layouts.admin')
@section('content')

@can('admin')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-responsive-sm table-hover table-outline mb-0 datatable datatable-User">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center"><i class="fa fa-picture-o"></i></th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Date Join</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        @php
                            $sate_join = strtotime($user->created_at);
                            $date_join = date('F d, Y H:i:sa', $sate_join);
                        @endphp
                        <tr data-entry-id="{{ $user->id }}">
                            <td class="text-center">
                                <div class="c-avatar">
                                    @if($user->profile_image)
                                        <a href="{{  $user->profile_image->getUrl() }}" target="_blank">
                                            <img class="img-fluid no-border" src="{{ $user->profile_image->getUrl('thumb') }}"  alt="{{ $user->name }} Profile Image">
                                        </a>
                                    @else
                                        <img class="img-fluid no-border" src="{{ asset('img/profile/default.jpeg') }}" alt="{{ $user->name }} Profile Image">
                                    @endif
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->first_name ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->last_name ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->mobile_no_1 ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->email ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $date_join ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-success" href="{{ route('admin.users.show', $user->id) }}">
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
    order: [[ 5, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection