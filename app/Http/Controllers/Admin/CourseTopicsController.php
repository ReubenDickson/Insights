<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseTopicRequest;
use App\Http\Requests\StoreCourseTopicRequest;
use App\Http\Requests\UpdateCourseTopicRequest;
use App\Models\Course;
use App\Models\CourseTopic;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CourseTopicsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_topic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseTopics = CourseTopic::with(['course', 'media'])->get();

        $courses = Course::get();

        return view('admin.courseTopics.index', compact('courseTopics', 'courses'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_topic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseTopics.create', compact('courses'));
    }

    public function store(StoreCourseTopicRequest $request)
    {
        $courseTopic = CourseTopic::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $courseTopic->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $courseTopic->id]);
        }

        return redirect()->route('admin.course-topics.index');
    }

    public function edit(CourseTopic $courseTopic)
    {
        abort_if(Gate::denies('course_topic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseTopic->load('course');

        return view('admin.courseTopics.edit', compact('courseTopic', 'courses'));
    }

    public function update(UpdateCourseTopicRequest $request, CourseTopic $courseTopic)
    {
        $courseTopic->update($request->all());

        if (count($courseTopic->photo) > 0) {
            foreach ($courseTopic->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $courseTopic->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $courseTopic->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.course-topics.index');
    }

    public function show(CourseTopic $courseTopic)
    {
        abort_if(Gate::denies('course_topic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseTopic->load('course');

        return view('admin.courseTopics.show', compact('courseTopic'));
    }

    public function destroy(CourseTopic $courseTopic)
    {
        abort_if(Gate::denies('course_topic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseTopic->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseTopicRequest $request)
    {
        CourseTopic::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_topic_create') && Gate::denies('course_topic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CourseTopic();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
