@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bankAccount.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bankAccount.fields.id') }}
                        </th>
                        <td>
                            {{ $bankAccount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankAccount.fields.owner') }}
                        </th>
                        <td>
                            {{ $bankAccount->owner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankAccount.fields.account_name') }}
                        </th>
                        <td>
                            {{ $bankAccount->account_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankAccount.fields.account_number') }}
                        </th>
                        <td>
                            {{ $bankAccount->account_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankAccount.fields.bank') }}
                        </th>
                        <td>
                            {{ $bankAccount->bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankAccount.fields.sortcode') }}
                        </th>
                        <td>
                            {{ $bankAccount->sortcode }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection