@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.period.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.periods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.id') }}
                        </th>
                        <td>
                            {{ $period->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.start_date') }}
                        </th>
                        <td>
                            {{ $period->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.end_date') }}
                        </th>
                        <td>
                            {{ $period->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.first_pool_balance') }}
                        </th>
                        <td>
                            {{ $period->first_pool_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.second_pool_balance') }}
                        </th>
                        <td>
                            {{ $period->second_pool_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.third_pool_balance') }}
                        </th>
                        <td>
                            {{ $period->third_pool_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.payout') }}
                        </th>
                        <td>
                            {{ $period->payout }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Period::STATUS_RADIO[$period->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.period.fields.comment') }}
                        </th>
                        <td>
                            {!! $period->comment !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.periods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection