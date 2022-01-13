<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles'])->get());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('profile_photo_path', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_photo_path'))))->toMediaCollection('profile_photo_path');
        }

        if ($request->input('identity_photo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('identity_photo'))))->toMediaCollection('identity_photo');
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('profile_photo_path', false)) {
            if (!$user->profile_photo_path || $request->input('profile_photo_path') !== $user->profile_photo_path->file_name) {
                if ($user->profile_photo_path) {
                    $user->profile_photo_path->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_photo_path'))))->toMediaCollection('profile_photo_path');
            }
        } elseif ($user->profile_photo_path) {
            $user->profile_photo_path->delete();
        }

        if ($request->input('identity_photo', false)) {
            if (!$user->identity_photo || $request->input('identity_photo') !== $user->identity_photo->file_name) {
                if ($user->identity_photo) {
                    $user->identity_photo->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('identity_photo'))))->toMediaCollection('identity_photo');
            }
        } elseif ($user->identity_photo) {
            $user->identity_photo->delete();
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
