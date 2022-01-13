<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirstTierPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirstTierPointsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('first_tier_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firstTierPoints = FirstTierPoint::with(['user'])->get();

        return view('admin.firstTierPoints.index', compact('firstTierPoints'));
    }

    public function show(FirstTierPoint $firstTierPoint)
    {
        abort_if(Gate::denies('first_tier_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firstTierPoint->load('user');

        return view('admin.firstTierPoints.show', compact('firstTierPoint'));
    }
}
