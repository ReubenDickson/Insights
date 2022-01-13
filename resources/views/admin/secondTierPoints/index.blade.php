@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.secondTierPoint.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SecondTierPoint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.secondTierPoint.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.secondTierPoint.fields.point_count') }}
                        </th>
                        <th>
                            {{ trans('cruds.secondTierPoint.fields.user') }}
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
                    @foreach($secondTierPoints as $key => $secondTierPoint)
                        <tr data-entry-id="{{ $secondTierPoint->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $secondTierPoint->id ?? '' }}
                            </td>
                            <td>
                                {{ $secondTierPoint->point_count ?? '' }}
                            </td>
                            <td>
                                {{ $secondTierPoint->user->username ?? '' }}
                            </td>
                            <td>
                                {{ $secondTierPoint->user->email ?? '' }}
                            </td>
                            <td>
                                @can('second_tier_point_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.second-tier-points.show', $secondTierPoint->id) }}">
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
  let table = $('.datatable-SecondTierPoint:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection