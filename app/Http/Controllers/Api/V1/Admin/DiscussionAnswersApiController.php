<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDiscussionAnswerRequest;
use App\Http\Requests\UpdateDiscussionAnswerRequest;
use App\Http\Resources\Admin\DiscussionAnswerResource;
use App\Models\DiscussionAnswer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscussionAnswersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('discussion_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscussionAnswerResource(DiscussionAnswer::with(['question', 'user'])->get());
    }

    public function store(StoreDiscussionAnswerRequest $request)
    {
        $discussionAnswer = DiscussionAnswer::create($request->all());

        return (new DiscussionAnswerResource($discussionAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DiscussionAnswer $discussionAnswer)
    {
        abort_if(Gate::denies('discussion_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscussionAnswerResource($discussionAnswer->load(['question', 'user']));
    }

    public function update(UpdateDiscussionAnswerRequest $request, DiscussionAnswer $discussionAnswer)
    {
        $discussionAnswer->update($request->all());

        return (new DiscussionAnswerResource($discussionAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DiscussionAnswer $discussionAnswer)
    {
        abort_if(Gate::denies('discussion_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionAnswer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
