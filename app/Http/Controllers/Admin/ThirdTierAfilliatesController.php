<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThirdTierAfilliate;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThirdTierAfilliatesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('third_tier_afilliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdTierAfilliates = ThirdTierAfilliate::with(['email'])->get();

        $users = User::get();

        return view('admin.thirdTierAfilliates.index', compact('thirdTierAfilliates', 'users'));
    }

    public function show(ThirdTierAfilliate $thirdTierAfilliate)
    {
        abort_if(Gate::denies('third_tier_afilliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdTierAfilliate->load('email');

        return view('admin.thirdTierAfilliates.show', compact('thirdTierAfilliate'));
    }
}
