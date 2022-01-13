@extends('layouts.admin')
@section('content')
@can('bank_account_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bank-accounts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bankAccount.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bankAccount.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BankAccount">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bankAccount.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bankAccount.fields.owner') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.middle_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.bankAccount.fields.account_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.bankAccount.fields.account_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.bankAccount.fields.bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.bankAccount.fields.sortcode') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bankAccounts as $key => $bankAccount)
                        <tr data-entry-id="{{ $bankAccount->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bankAccount->id ?? '' }}
                            </td>
                            <td>
                                {{ $bankAccount->owner->name ?? '' }}
                            </td>
                            <td>
                                {{ $bankAccount->owner->middle_name ?? '' }}
                            </td>
                            <td>
                                {{ $bankAccount->owner->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $bankAccount->account_name ?? '' }}
                            </td>
                            <td>
                                {{ $bankAccount->account_number ?? '' }}
                            </td>
                            <td>
                                {{ $bankAccount->bank ?? '' }}
                            </td>
                            <td>
                                {{ $bankAccount->sortcode ?? '' }}
                            </td>
                            <td>

                                @can('bank_account_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bank-accounts.edit', $bankAccount->id) }}">
                                        {{ trans('global.edit') }}
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
  let table = $('.datatable-BankAccount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection