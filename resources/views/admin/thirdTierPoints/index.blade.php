@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.thirdTierPoint.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ThirdTierPoint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.thirdTierPoint.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdTierPoint.fields.point_count') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdTierPoint.fields.user') }}
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
                    @foreach($thirdTierPoints as $key => $thirdTierPoint)
                        <tr data-entry-id="{{ $thirdTierPoint->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $thirdTierPoint->id ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierPoint->point_count ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierPoint->user->username ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierPoint->user->email ?? '' }}
                            </td>
                            <td>
                                @can('third_tier_point_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.third-tier-points.show', $thirdTierPoint->id) }}">
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
  let table = $('.datatable-ThirdTierPoint:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection