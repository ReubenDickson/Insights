@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.thirdTierPoint.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.third-tier-points.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="point_count">{{ trans('cruds.thirdTierPoint.fields.point_count') }}</label>
                <input class="form-control {{ $errors->has('point_count') ? 'is-invalid' : '' }}" type="number" name="point_count" id="point_count" value="{{ old('point_count', '0') }}" step="1" required>
                @if($errors->has('point_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.thirdTierPoint.fields.point_count_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection