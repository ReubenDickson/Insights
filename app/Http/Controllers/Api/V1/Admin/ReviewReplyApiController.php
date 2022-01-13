<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreReviewReplyRequest;
use App\Http\Requests\UpdateReviewReplyRequest;
use App\Http\Resources\Admin\ReviewReplyResource;
use App\Models\ReviewReply;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewReplyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('review_reply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReviewReplyResource(ReviewReply::with(['review', 'reviewer'])->get());
    }

    public function store(StoreReviewReplyRequest $request)
    {
        $reviewReply = ReviewReply::create($request->all());

        return (new ReviewReplyResource($reviewReply))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReviewReplyResource($reviewReply->load(['review', 'reviewer']));
    }

    public function update(UpdateReviewReplyRequest $request, ReviewReply $reviewReply)
    {
        $reviewReply->update($request->all());

        return (new ReviewReplyResource($reviewReply))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReviewReply $reviewReply)
    {
        abort_if(Gate::denies('review_reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewReply->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
