@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.walletTransaction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.wallet-transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.id') }}
                        </th>
                        <td>
                            {{ $walletTransaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.owner') }}
                        </th>
                        <td>
                            {{ $walletTransaction->owner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.transaction') }}
                        </th>
                        <td>
                            {!! $walletTransaction->transaction !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.amount') }}
                        </th>
                        <td>
                            {{ $walletTransaction->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.balance') }}
                        </th>
                        <td>
                            {{ $walletTransaction->balance->balance ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.wallet-transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection