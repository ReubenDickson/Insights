@extends('layouts.admin')
@section('content')


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