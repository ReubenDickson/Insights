<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUserActivityRequest;
use App\Http\Requests\UpdateUserActivityRequest;
use App\Http\Resources\Admin\UserActivityResource;
use App\Models\UserActivity;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserActivityApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_activity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserActivityResource(UserActivity::with(['user'])->get());
    }

    public function store(StoreUserActivityRequest $request)
    {
        $userActivity = UserActivity::create($request->all());

        return (new UserActivityResource($userActivity))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserActivity $userActivity)
    {
        abort_if(Gate::denies('user_activity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserActivityResource($userActivity->load(['user']));
    }

    public function update(UpdateUserActivityRequest $request, UserActivity $userActivity)
    {
        $userActivity->update($request->all());

        return (new UserActivityResource($userActivity))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserActivity $userActivity)
    {
        abort_if(Gate::denies('user_activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userActivity->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
