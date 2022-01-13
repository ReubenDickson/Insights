@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.referalCount.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReferalCount">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.referalCount.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.referalCount.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.level') }}
                        </th>
                        <th>
                            {{ trans('cruds.referalCount.fields.count') }}
                        </th>
                        <th>
                            {{ trans('cruds.referalCount.fields.sponsor') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
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
                    @foreach($referalCounts as $key => $referalCount)
                        <tr data-entry-id="{{ $referalCount->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $referalCount->id ?? '' }}
                            </td>
                            <td>
                                {{ $referalCount->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $referalCount->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $referalCount->user->level ?? '' }}
                            </td>
                            <td>
                                {{ $referalCount->count ?? '' }}
                            </td>
                            <td>
                                {{ $referalCount->sponsor->username ?? '' }}
                            </td>
                            <td>
                                {{ $referalCount->sponsor->name ?? '' }}
                            </td>
                            <td>
                                {{ $referalCount->sponsor->email ?? '' }}
                            </td>
                            <td>
                                @can('referal_count_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.referal-counts.show', $referalCount->id) }}">
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

<div class="card">
    <div class="card-header">
Referal Assets
    </div>

    <div class="card-body">
                    <h6>Copy and Share Your Affiliate Link</h6>
                    
                    @if(Auth::user()->affiliate_id)
                    <input id="myInput" type="text" readonly="readonly" value = "{{url('/').'/?ref='.Auth::user()->affiliate_id}}"> 
                    <button class="btn-primary" onclick="myFunction()">Copy</button>
                    @endif

    </div>

    <div class="card-body">
        
            
            <h6>Total Referal Count</h6>
            
        
    </div>
    <div class="card-body">
        
            
        <h6>User Level</h6>
        
    
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
  let table = $('.datatable-ReferalCount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection