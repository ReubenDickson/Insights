@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseRating.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-ratings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseRating.fields.id') }}
                        </th>
                        <td>
                            {{ $courseRating->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseRating.fields.course') }}
                        </th>
                        <td>
                            {{ $courseRating->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseRating.fields.average_ratings') }}
                        </th>
                        <td>
                            {{ $courseRating->average_ratings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseRating.fields.total_reviews') }}
                        </th>
                        <td>
                            {{ $courseRating->total_reviews }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseRating.fields.total_stars') }}
                        </th>
                        <td>
                            {{ $courseRating->total_stars }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-ratings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection