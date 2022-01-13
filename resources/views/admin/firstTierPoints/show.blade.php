@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.firstTierPoint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.first-tier-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.firstTierPoint.fields.id') }}
                        </th>
                        <td>
                            {{ $firstTierPoint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.firstTierPoint.fields.point_count') }}
                        </th>
                        <td>
                            {{ $firstTierPoint->point_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.firstTierPoint.fields.user') }}
                        </th>
                        <td>
                            {{ $firstTierPoint->user->username ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.first-tier-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection