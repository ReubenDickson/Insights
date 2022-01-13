<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCourseReviewRequest;
use App\Http\Requests\UpdateCourseReviewRequest;
use App\Http\Resources\Admin\CourseReviewResource;
use App\Models\CourseReview;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseReviewsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('course_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseReviewResource(CourseReview::with(['course', 'user'])->get());
    }

    public function store(StoreCourseReviewRequest $request)
    {
        $courseReview = CourseReview::create($request->all());

        return (new CourseReviewResource($courseReview))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseReview $courseReview)
    {
        abort_if(Gate::denies('course_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseReviewResource($courseReview->load(['course', 'user']));
    }

    public function update(UpdateCourseReviewRequest $request, CourseReview $courseReview)
    {
        $courseReview->update($request->all());

        return (new CourseReviewResource($courseReview))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseReview $courseReview)
    {
        abort_if(Gate::denies('course_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseReview->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
