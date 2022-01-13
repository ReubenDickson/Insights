@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tradeSignal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trade-signals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tradeSignal.fields.id') }}
                        </th>
                        <td>
                            {{ $tradeSignal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tradeSignal.fields.crypto_pair') }}
                        </th>
                        <td>
                            {{ $tradeSignal->crypto_pair }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tradeSignal.fields.entry') }}
                        </th>
                        <td>
                            {{ $tradeSignal->entry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tradeSignal.fields.exit') }}
                        </th>
                        <td>
                            {{ $tradeSignal->exit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tradeSignal.fields.stop_loss') }}
                        </th>
                        <td>
                            {{ $tradeSignal->stop_loss }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tradeSignal.fields.comment') }}
                        </th>
                        <td>
                            {!! $tradeSignal->comment !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trade-signals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection