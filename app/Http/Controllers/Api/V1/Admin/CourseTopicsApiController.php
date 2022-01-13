<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCourseTopicRequest;
use App\Http\Requests\UpdateCourseTopicRequest;
use App\Http\Resources\Admin\CourseTopicResource;
use App\Models\CourseTopic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseTopicsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_topic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseTopicResource(CourseTopic::with(['course'])->get());
    }

    public function store(StoreCourseTopicRequest $request)
    {
        $courseTopic = CourseTopic::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $courseTopic->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        return (new CourseTopicResource($courseTopic))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseTopic $courseTopic)
    {
        abort_if(Gate::denies('course_topic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseTopicResource($courseTopic->load(['course']));
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

        return (new CourseTopicResource($courseTopic))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseTopic $courseTopic)
    {
        abort_if(Gate::denies('course_topic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseTopic->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
