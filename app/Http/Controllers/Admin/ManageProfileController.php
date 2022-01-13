<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyManageProfileRequest;
use App\Http\Requests\StoreManageProfileRequest;
use App\Http\Requests\UpdateManageProfileRequest;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageProfiles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manage_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageProfiles.create');
    }

    public function store(StoreManageProfileRequest $request)
    {
        $manageProfile = ManageProfile::create($request->all());

        return redirect()->route('admin.manage-profiles.index');
    }

    public function edit(ManageProfile $manageProfile)
    {
        abort_if(Gate::denies('manage_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageProfiles.edit', compact('manageProfile'));
    }

    public function update(UpdateManageProfileRequest $request, ManageProfile $manageProfile)
    {
        $manageProfile->update($request->all());

        return redirect()->route('admin.manage-profiles.index');
    }

    //my new edit function

    public function editProfile($id){
        $user = User::find($id)->first();
        return view ('admin.manage-profiles.edit')->with('user', $user);

    }

    // the updateProfile function

    public function updateProfile(UpdateManageProfileRequest $request, User $user)
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

        return redirect()->route('admin.users.index');
    }

    public function show(ManageProfile $manageProfile)
    {
        abort_if(Gate::denies('manage_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageProfiles.show', compact('manageProfile'));
    }

    public function destroy(ManageProfile $manageProfile)
    {
        abort_if(Gate::denies('manage_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyManageProfileRequest $request)
    {
        ManageProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
