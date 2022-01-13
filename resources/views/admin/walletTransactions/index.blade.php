@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.walletTransaction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WalletTransaction">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.owner') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.balance') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($walletTransactions as $key => $walletTransaction)
                        <tr data-entry-id="{{ $walletTransaction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $walletTransaction->id ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->owner->name ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->owner->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->amount ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->balance->balance ?? '' }}
                            </td>
                            <td>



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
  let table = $('.datatable-WalletTransaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection