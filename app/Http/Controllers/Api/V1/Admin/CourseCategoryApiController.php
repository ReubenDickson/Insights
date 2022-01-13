<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseCategoryRequest;
use App\Http\Requests\UpdateCourseCategoryRequest;
use App\Http\Resources\Admin\CourseCategoryResource;
use App\Models\CourseCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseCategoryResource(CourseCategory::all());
    }

    public function store(StoreCourseCategoryRequest $request)
    {
        $courseCategory = CourseCategory::create($request->all());

        return (new CourseCategoryResource($courseCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseCategory $courseCategory)
    {
        abort_if(Gate::denies('course_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseCategoryResource($courseCategory);
    }

    public function update(UpdateCourseCategoryRequest $request, CourseCategory $courseCategory)
    {
        $courseCategory->update($request->all());

        return (new CourseCategoryResource($courseCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
