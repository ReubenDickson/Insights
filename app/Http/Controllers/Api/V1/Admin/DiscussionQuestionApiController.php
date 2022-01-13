<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDiscussionQuestionRequest;
use App\Http\Requests\UpdateDiscussionQuestionRequest;
use App\Http\Resources\Admin\DiscussionQuestionResource;
use App\Models\DiscussionQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscussionQuestionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('discussion_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscussionQuestionResource(DiscussionQuestion::with(['course', 'user'])->get());
    }

    public function store(StoreDiscussionQuestionRequest $request)
    {
        $discussionQuestion = DiscussionQuestion::create($request->all());

        return (new DiscussionQuestionResource($discussionQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DiscussionQuestion $discussionQuestion)
    {
        abort_if(Gate::denies('discussion_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscussionQuestionResource($discussionQuestion->load(['course', 'user']));
    }

    public function update(UpdateDiscussionQuestionRequest $request, DiscussionQuestion $discussionQuestion)
    {
        $discussionQuestion->update($request->all());

        return (new DiscussionQuestionResource($discussionQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DiscussionQuestion $discussionQuestion)
    {
        abort_if(Gate::denies('discussion_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionQuestion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
