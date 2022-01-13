@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.thirdTierAfilliate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ThirdTierAfilliate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.thirdTierAfilliate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdTierAfilliate.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.level') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdTierAfilliate.fields.date_became_third_tier') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->email }}">{{ $item->email }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($thirdTierAfilliates as $key => $thirdTierAfilliate)
                        <tr data-entry-id="{{ $thirdTierAfilliate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $thirdTierAfilliate->id ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierAfilliate->email->email ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierAfilliate->email->name ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierAfilliate->email->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierAfilliate->email->level ?? '' }}
                            </td>
                            <td>
                                {{ $thirdTierAfilliate->date_became_third_tier ?? '' }}
                            </td>
                            <td>
                                @can('third_tier_afilliate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.third-tier-afilliates.show', $thirdTierAfilliate->id) }}">
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
  let table = $('.datatable-ThirdTierAfilliate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection