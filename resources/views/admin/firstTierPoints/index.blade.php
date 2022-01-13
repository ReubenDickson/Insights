@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.firstTierPoint.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FirstTierPoint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.firstTierPoint.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.firstTierPoint.fields.point_count') }}
                        </th>
                        <th>
                            {{ trans('cruds.firstTierPoint.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($firstTierPoints as $key => $firstTierPoint)
                        <tr data-entry-id="{{ $firstTierPoint->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $firstTierPoint->id ?? '' }}
                            </td>
                            <td>
                                {{ $firstTierPoint->point_count ?? '' }}
                            </td>
                            <td>
                                {{ $firstTierPoint->user->username ?? '' }}
                            </td>
                            <td>
                                {{ $firstTierPoint->user->email ?? '' }}
                            </td>
                            <td>
                                @can('first_tier_point_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.first-tier-points.show', $firstTierPoint->id) }}">
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
    pageLength: 100,
  });
  let table = $('.datatable-FirstTierPoint:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection