@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.thirdTierPoint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.third-tier-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdTierPoint.fields.id') }}
                        </th>
                        <td>
                            {{ $thirdTierPoint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdTierPoint.fields.point_count') }}
                        </th>
                        <td>
                            {{ $thirdTierPoint->point_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdTierPoint.fields.user') }}
                        </th>
                        <td>
                            {{ $thirdTierPoint->user->username ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.third-tier-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection