<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePeriodRequest;
use App\Models\Period;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PeriodController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('period_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periods = Period::all();

        return view('admin.periods.index', compact('periods'));
    }

    public function create()
    {
        abort_if(Gate::denies('period_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.periods.create');
    }

    public function store(StorePeriodRequest $request)
    {
        $period = Period::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $period->id]);
        }

        return redirect()->route('admin.periods.index');
    }

    public function show(Period $period)
    {
        abort_if(Gate::denies('period_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.periods.show', compact('period'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('period_create') && Gate::denies('period_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Period();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
