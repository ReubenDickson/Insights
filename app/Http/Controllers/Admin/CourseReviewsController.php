<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseReviewRequest;
use App\Http\Requests\StoreCourseReviewRequest;
use App\Http\Requests\UpdateCourseReviewRequest;
use App\Models\Course;
use App\Models\CourseReview;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CourseReviewsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseReviews = CourseReview::with(['course', 'user'])->get();

        $courses = Course::get();

        $users = User::get();

        return view('admin.courseReviews.index', compact('courseReviews', 'courses', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseReviews.create', compact('courses', 'users'));
    }

    public function store(StoreCourseReviewRequest $request)
    {
        $courseReview = CourseReview::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $courseReview->id]);
        }

        return redirect()->route('admin.course-reviews.index');
    }

    public function edit(CourseReview $courseReview)
    {
        abort_if(Gate::denies('course_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseReview->load('course', 'user');

        return view('admin.courseReviews.edit', compact('courseReview', 'courses', 'users'));
    }

    public function update(UpdateCourseReviewRequest $request, CourseReview $courseReview)
    {
        $courseReview->update($request->all());

        return redirect()->route('admin.course-reviews.index');
    }

    public function show(CourseReview $courseReview)
    {
        abort_if(Gate::denies('course_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseReview->load('course', 'user');

        return view('admin.courseReviews.show', compact('courseReview'));
    }

    public function destroy(CourseReview $courseReview)
    {
        abort_if(Gate::denies('course_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseReviewRequest $request)
    {
        CourseReview::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_review_create') && Gate::denies('course_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CourseReview();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
