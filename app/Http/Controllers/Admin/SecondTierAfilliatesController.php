<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SecondTierAfilliate;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecondTierAfilliatesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('second_tier_afilliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secondTierAfilliates = SecondTierAfilliate::with(['email'])->get();

        $users = User::get();

        return view('admin.secondTierAfilliates.index', compact('secondTierAfilliates', 'users'));
    }

    public function show(SecondTierAfilliate $secondTierAfilliate)
    {
        abort_if(Gate::denies('second_tier_afilliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secondTierAfilliate->load('email');

        return view('admin.secondTierAfilliates.show', compact('secondTierAfilliate'));
    }
}
