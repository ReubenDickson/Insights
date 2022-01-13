@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reviewReply.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.review-replies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewReply.fields.id') }}
                        </th>
                        <td>
                            {{ $reviewReply->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewReply.fields.review') }}
                        </th>
                        <td>
                            {{ $reviewReply->review->review ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewReply.fields.reply') }}
                        </th>
                        <td>
                            {!! $reviewReply->reply !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewReply.fields.reviewer') }}
                        </th>
                        <td>
                            {{ $reviewReply->reviewer->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.review-replies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection