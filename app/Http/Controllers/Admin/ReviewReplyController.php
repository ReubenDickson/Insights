<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReviewReplyRequest;
use App\Http\Requests\StoreReviewReplyRequest;
use App\Http\Requests\UpdateReviewReplyRequest;
use App\Models\CourseReview;
use App\Models\ReviewReply;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReviewReplyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('review_reply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewReplies = ReviewReply::with(['review', 'reviewer'])->get();

        return view('admin.reviewReplies.index', compact('reviewReplies'));
    }

    public function create()
    {
        abort_if(Gate::denies('review_reply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviews = CourseReview::pluck('review', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reviewers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reviewReplies.create', compact('reviewers', 'reviews'));
    }

    public function store(StoreReviewReplyRequest $request)
    {
        $reviewReply = ReviewReply::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $reviewReply->id]);
        }

        return redirect()->route('admin.review-replies.index');
    }

    public function edit(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviews = CourseReview::pluck('review', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reviewers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reviewReply->load('review', 'reviewer');

        return view('admin.reviewReplies.edit', compact('reviewReply', 'reviewers', 'reviews'));
    }

    public function update(UpdateReviewReplyRequest $request, ReviewReply $reviewReply)
    {
        $reviewReply->update($request->all());

        return redirect()->route('admin.review-replies.index');
    }

    public function show(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewReply->load('review', 'reviewer');

        return view('admin.reviewReplies.show', compact('reviewReply'));
    }

    public function destroy(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewReply->delete();

        return back();
    }

    public function massDestroy(MassDestroyReviewReplyRequest $request)
    {
        ReviewReply::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('review_reply_create') && Gate::denies('review_reply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ReviewReply();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
