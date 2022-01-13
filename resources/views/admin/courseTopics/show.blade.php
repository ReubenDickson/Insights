@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseTopic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-topics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseTopic.fields.id') }}
                        </th>
                        <td>
                            {{ $courseTopic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseTopic.fields.course') }}
                        </th>
                        <td>
                            {{ $courseTopic->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseTopic.fields.topic') }}
                        </th>
                        <td>
                            {{ $courseTopic->topic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseTopic.fields.transcript') }}
                        </th>
                        <td>
                            {!! $courseTopic->transcript !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseTopic.fields.photo') }}
                        </th>
                        <td>
                            @foreach($courseTopic->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseTopic.fields.video_link') }}
                        </th>
                        <td>
                            {{ $courseTopic->video_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-topics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection