<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDiscussionQuestionRequest;
use App\Http\Requests\StoreDiscussionQuestionRequest;
use App\Http\Requests\UpdateDiscussionQuestionRequest;
use App\Models\Course;
use App\Models\DiscussionQuestion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DiscussionQuestionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('discussion_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionQuestions = DiscussionQuestion::with(['course', 'user'])->get();

        $courses = Course::get();

        $users = User::get();

        return view('admin.discussionQuestions.index', compact('courses', 'discussionQuestions', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('discussion_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.discussionQuestions.create', compact('courses', 'users'));
    }

    public function store(StoreDiscussionQuestionRequest $request)
    {
        $discussionQuestion = DiscussionQuestion::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $discussionQuestion->id]);
        }

        return redirect()->route('admin.discussion-questions.index');
    }

    public function edit(DiscussionQuestion $discussionQuestion)
    {
        abort_if(Gate::denies('discussion_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $discussionQuestion->load('course', 'user');

        return view('admin.discussionQuestions.edit', compact('courses', 'discussionQuestion', 'users'));
    }

    public function update(UpdateDiscussionQuestionRequest $request, DiscussionQuestion $discussionQuestion)
    {
        $discussionQuestion->update($request->all());

        return redirect()->route('admin.discussion-questions.index');
    }

    public function show(DiscussionQuestion $discussionQuestion)
    {
        abort_if(Gate::denies('discussion_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionQuestion->load('course', 'user');

        return view('admin.discussionQuestions.show', compact('discussionQuestion'));
    }

    public function destroy(DiscussionQuestion $discussionQuestion)
    {
        abort_if(Gate::denies('discussion_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discussionQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiscussionQuestionRequest $request)
    {
        DiscussionQuestion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('discussion_question_create') && Gate::denies('discussion_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DiscussionQuestion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
