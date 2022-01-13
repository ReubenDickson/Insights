<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDiscussionAnswerRequest;
use App\Http\Requests\StoreDiscussionAnswerRequest;
use App\Http\Requests\UpdateDiscussionAnswerRequest;
use App\Models\DiscussionAnswer;
use App\Models\DiscussionQuestion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DiscussionAnswersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('discussion_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionAnswers = DiscussionAnswer::with(['question', 'user'])->get();

        $discussion_questions = DiscussionQuestion::get();

        $users = User::get();

        return view('admin.discussionAnswers.index', compact('discussionAnswers', 'discussion_questions', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('discussion_answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = DiscussionQuestion::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.discussionAnswers.create', compact('questions', 'users'));
    }

    public function store(StoreDiscussionAnswerRequest $request)
    {
        $discussionAnswer = DiscussionAnswer::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $discussionAnswer->id]);
        }

        return redirect()->route('admin.discussion-answers.index');
    }

    public function edit(DiscussionAnswer $discussionAnswer)
    {
        abort_if(Gate::denies('discussion_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = DiscussionQuestion::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $discussionAnswer->load('question', 'user');

        return view('admin.discussionAnswers.edit', compact('discussionAnswer', 'questions', 'users'));
    }

    public function update(UpdateDiscussionAnswerRequest $request, DiscussionAnswer $discussionAnswer)
    {
        $discussionAnswer->update($request->all());

        return redirect()->route('admin.discussion-answers.index');
    }

    public function show(DiscussionAnswer $discussionAnswer)
    {
        abort_if(Gate::denies('discussion_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionAnswer->load('question', 'user');

        return view('admin.discussionAnswers.show', compact('discussionAnswer'));
    }

    public function destroy(DiscussionAnswer $discussionAnswer)
    {
        abort_if(Gate::denies('discussion_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionAnswer->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiscussionAnswerRequest $request)
    {
        DiscussionAnswer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('discussion_answer_create') && Gate::denies('discussion_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DiscussionAnswer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
