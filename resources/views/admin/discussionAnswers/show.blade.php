@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.discussionAnswer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.discussion-answers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.discussionAnswer.fields.id') }}
                        </th>
                        <td>
                            {{ $discussionAnswer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discussionAnswer.fields.question') }}
                        </th>
                        <td>
                            {{ $discussionAnswer->question->question ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discussionAnswer.fields.user') }}
                        </th>
                        <td>
                            {{ $discussionAnswer->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discussionAnswer.fields.answer') }}
                        </th>
                        <td>
                            {!! $discussionAnswer->answer !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.discussion-answers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection