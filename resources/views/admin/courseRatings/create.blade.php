@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.courseRating.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-ratings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.courseRating.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRating.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_ratings">{{ trans('cruds.courseRating.fields.average_ratings') }}</label>
                <input class="form-control {{ $errors->has('average_ratings') ? 'is-invalid' : '' }}" type="number" name="average_ratings" id="average_ratings" value="{{ old('average_ratings', '5.0') }}" step="0.01">
                @if($errors->has('average_ratings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('average_ratings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRating.fields.average_ratings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_reviews">{{ trans('cruds.courseRating.fields.total_reviews') }}</label>
                <input class="form-control {{ $errors->has('total_reviews') ? 'is-invalid' : '' }}" type="number" name="total_reviews" id="total_reviews" value="{{ old('total_reviews', '') }}" step="1">
                @if($errors->has('total_reviews'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_reviews') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRating.fields.total_reviews_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_stars">{{ trans('cruds.courseRating.fields.total_stars') }}</label>
                <input class="form-control {{ $errors->has('total_stars') ? 'is-invalid' : '' }}" type="number" name="total_stars" id="total_stars" value="{{ old('total_stars', '') }}" step="1">
                @if($errors->has('total_stars'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_stars') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRating.fields.total_stars_helper') }}</span>
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