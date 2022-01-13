@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.secondTierAfilliate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.second-tier-afilliates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.secondTierAfilliate.fields.id') }}
                        </th>
                        <td>
                            {{ $secondTierAfilliate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secondTierAfilliate.fields.email') }}
                        </th>
                        <td>
                            {{ $secondTierAfilliate->email->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.secondTierAfilliate.fields.date_became_second_tier') }}
                        </th>
                        <td>
                            {{ $secondTierAfilliate->date_became_second_tier }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.second-tier-afilliates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection