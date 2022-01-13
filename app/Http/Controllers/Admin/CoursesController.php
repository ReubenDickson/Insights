<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::with(['tutor', 'category', 'media'])->get();

        $users = User::get();

        $course_categories = CourseCategory::get();

        return view('admin.courses.index', compact('course_categories', 'courses', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutors = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CourseCategory::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courses.create', compact('categories', 'tutors'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());

        foreach ($request->input('photo_path', []) as $file) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo_path');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $course->id]);
        }

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutors = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CourseCategory::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course->load('tutor', 'category');

        return view('admin.courses.edit', compact('categories', 'course', 'tutors'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());

        if (count($course->photo_path) > 0) {
            foreach ($course->photo_path as $media) {
                if (!in_array($media->file_name, $request->input('photo_path', []))) {
                    $media->delete();
                }
            }
        }
        $media = $course->photo_path->pluck('file_name')->toArray();
        foreach ($request->input('photo_path', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $course->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo_path');
            }
        }

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('tutor', 'category');

        return view('admin.courses.show', compact('course'));
    }

    // My Route for all Courses

    public function showAllCourses(Course $course)
    {
        // abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course = courses::all();

        return view('admin.allCourses.index', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_create') && Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Course();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
