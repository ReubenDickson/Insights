@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.poolEarning.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PoolEarning">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.poolEarning.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolEarning.fields.period') }}
                        </th>
                        <th>
                            {{ trans('cruds.period.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolEarning.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolEarning.fields.direct_referal_earnings') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolEarning.fields.first_tier_earnings') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolEarning.fields.second_tier_earnings') }}
                        </th>
                        <th>
                            {{ trans('cruds.poolEarning.fields.third_tier_earnings') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poolEarnings as $key => $poolEarning)
                        <tr data-entry-id="{{ $poolEarning->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $poolEarning->id ?? '' }}
                            </td>
                            <td>
                                {{ $poolEarning->period->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $poolEarning->period->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $poolEarning->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $poolEarning->direct_referal_earnings ?? '' }}
                            </td>
                            <td>
                                {{ $poolEarning->first_tier_earnings ?? '' }}
                            </td>
                            <td>
                                {{ $poolEarning->second_tier_earnings ?? '' }}
                            </td>
                            <td>
                                {{ $poolEarning->third_tier_earnings ?? '' }}
                            </td>
                            <td>
                                @can('pool_earning_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pool-earnings.show', $poolEarning->id) }}">
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
  let table = $('.datatable-PoolEarning:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection