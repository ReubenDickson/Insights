@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.secondTierPoint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.second-tier-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.secondTierPoint.fields.id') }}
                        </th>
                        <td>
                            {{ $secondTierPoint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secondTierPoint.fields.point_count') }}
                        </th>
                        <td>
                            {{ $secondTierPoint->point_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secondTierPoint.fields.user') }}
                        </th>
                        <td>
                            {{ $secondTierPoint->user->username ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.second-tier-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection