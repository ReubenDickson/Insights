<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProCourseRequest;
use App\Http\Requests\StoreProCourseRequest;
use App\Http\Requests\UpdateProCourseRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProCoursesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pro_course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proCourses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pro_course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proCourses.create');
    }

    public function store(StoreProCourseRequest $request)
    {
        $proCourse = ProCourse::create($request->all());

        return redirect()->route('admin.pro-courses.index');
    }

    public function edit(ProCourse $proCourse)
    {
        abort_if(Gate::denies('pro_course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proCourses.edit', compact('proCourse'));
    }

    public function update(UpdateProCourseRequest $request, ProCourse $proCourse)
    {
        $proCourse->update($request->all());

        return redirect()->route('admin.pro-courses.index');
    }

    public function show(ProCourse $proCourse)
    {
        abort_if(Gate::denies('pro_course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proCourses.show', compact('proCourse'));
    }

    public function destroy(ProCourse $proCourse)
    {
        abort_if(Gate::denies('pro_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proCourse->delete();

        return back();
    }

    public function massDestroy(MassDestroyProCourseRequest $request)
    {
        ProCourse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
