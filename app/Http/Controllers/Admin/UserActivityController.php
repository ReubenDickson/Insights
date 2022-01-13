<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserActivityRequest;
use App\Http\Requests\StoreUserActivityRequest;
use App\Http\Requests\UpdateUserActivityRequest;
use App\Models\User;
use App\Models\UserActivity;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UserActivityController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_activity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userActivities = UserActivity::with(['user'])->get();

        $users = User::get();

        return view('admin.userActivities.index', compact('userActivities', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_activity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userActivities.create', compact('users'));
    }

    public function store(StoreUserActivityRequest $request)
    {
        $userActivity = UserActivity::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $userActivity->id]);
        }

        return redirect()->route('admin.user-activities.index');
    }

    public function edit(UserActivity $userActivity)
    {
        abort_if(Gate::denies('user_activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userActivity->load('user');

        return view('admin.userActivities.edit', compact('userActivity', 'users'));
    }

    public function update(UpdateUserActivityRequest $request, UserActivity $userActivity)
    {
        $userActivity->update($request->all());

        return redirect()->route('admin.user-activities.index');
    }

    public function show(UserActivity $userActivity)
    {
        abort_if(Gate::denies('user_activity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userActivity->load('user');

        return view('admin.userActivities.show', compact('userActivity'));
    }

    public function destroy(UserActivity $userActivity)
    {
        abort_if(Gate::denies('user_activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userActivity->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserActivityRequest $request)
    {
        UserActivity::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_activity_create') && Gate::denies('user_activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new UserActivity();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
