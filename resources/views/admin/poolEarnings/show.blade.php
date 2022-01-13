@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.poolEarning.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pool-earnings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.poolEarning.fields.id') }}
                        </th>
                        <td>
                            {{ $poolEarning->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolEarning.fields.period') }}
                        </th>
                        <td>
                            {{ $poolEarning->period->start_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolEarning.fields.user') }}
                        </th>
                        <td>
                            {{ $poolEarning->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolEarning.fields.direct_referal_earnings') }}
                        </th>
                        <td>
                            {{ $poolEarning->direct_referal_earnings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolEarning.fields.first_tier_earnings') }}
                        </th>
                        <td>
                            {{ $poolEarning->first_tier_earnings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolEarning.fields.second_tier_earnings') }}
                        </th>
                        <td>
                            {{ $poolEarning->second_tier_earnings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolEarning.fields.third_tier_earnings') }}
                        </th>
                        <td>
                            {{ $poolEarning->third_tier_earnings }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pool-earnings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection