<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirstTierAfilliate;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirstTierAfilliatesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('first_tier_afilliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firstTierAfilliates = FirstTierAfilliate::with(['email'])->get();

        $users = User::get();

        return view('admin.firstTierAfilliates.index', compact('firstTierAfilliates', 'users'));
    }

    public function show(FirstTierAfilliate $firstTierAfilliate)
    {
        abort_if(Gate::denies('first_tier_afilliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firstTierAfilliate->load('email');

        return view('admin.firstTierAfilliates.show', compact('firstTierAfilliate'));
    }
}
