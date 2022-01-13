@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseReview.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseReview.fields.id') }}
                        </th>
                        <td>
                            {{ $courseReview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseReview.fields.course') }}
                        </th>
                        <td>
                            {{ $courseReview->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseReview.fields.user') }}
                        </th>
                        <td>
                            {{ $courseReview->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseReview.fields.review') }}
                        </th>
                        <td>
                            {!! $courseReview->review !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseReview.fields.stars') }}
                        </th>
                        <td>
                            {{ $courseReview->stars }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection