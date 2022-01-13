@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.referalCount.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.referal-counts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.referalCount.fields.id') }}
                        </th>
                        <td>
                            {{ $referalCount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referalCount.fields.user') }}
                        </th>
                        <td>
                            {{ $referalCount->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referalCount.fields.count') }}
                        </th>
                        <td>
                            {{ $referalCount->count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referalCount.fields.sponsor') }}
                        </th>
                        <td>
                            {{ $referalCount->sponsor->username ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.referal-counts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection