<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseRatingRequest;
use App\Http\Requests\StoreCourseRatingRequest;
use App\Http\Requests\UpdateCourseRatingRequest;
use App\Models\Course;
use App\Models\CourseRating;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseRatingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_rating_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseRatings = CourseRating::with(['course'])->get();

        return view('admin.courseRatings.index', compact('courseRatings'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_rating_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseRatings.create', compact('courses'));
    }

    public function store(StoreCourseRatingRequest $request)
    {
        $courseRating = CourseRating::create($request->all());

        return redirect()->route('admin.course-ratings.index');
    }

    public function edit(CourseRating $courseRating)
    {
        abort_if(Gate::denies('course_rating_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseRating->load('course');

        return view('admin.courseRatings.edit', compact('courseRating', 'courses'));
    }

    public function update(UpdateCourseRatingRequest $request, CourseRating $courseRating)
    {
        $courseRating->update($request->all());

        return redirect()->route('admin.course-ratings.index');
    }

    public function show(CourseRating $courseRating)
    {
        abort_if(Gate::denies('course_rating_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseRating->load('course');

        return view('admin.courseRatings.show', compact('courseRating'));
    }

    public function destroy(CourseRating $courseRating)
    {
        abort_if(Gate::denies('course_rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseRating->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRatingRequest $request)
    {
        CourseRating::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
