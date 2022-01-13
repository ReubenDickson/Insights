@extends('layouts.admin')
@section('content')
@can('period_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.periods.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.period.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.period.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Period">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.period.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.first_pool_balance') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.second_pool_balance') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.third_pool_balance') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.payout') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periods as $key => $period)
                        <tr data-entry-id="{{ $period->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $period->id ?? '' }}
                            </td>
                            <td>
                                {{ $period->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $period->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $period->first_pool_balance ?? '' }}
                            </td>
                            <td>
                                {{ $period->second_pool_balance ?? '' }}
                            </td>
                            <td>
                                {{ $period->third_pool_balance ?? '' }}
                            </td>
                            <td>
                                {{ $period->payout ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Period::STATUS_RADIO[$period->status] ?? '' }}
                            </td>
                            <td>
                                @can('period_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.periods.show', $period->id) }}">
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
  let table = $('.datatable-Period:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection