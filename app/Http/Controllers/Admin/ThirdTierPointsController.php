<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThirdTierPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThirdTierPointsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('third_tier_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdTierPoints = ThirdTierPoint::with(['user'])->get();

        return view('admin.thirdTierPoints.index', compact('thirdTierPoints'));
    }

    public function show(ThirdTierPoint $thirdTierPoint)
    {
        abort_if(Gate::denies('third_tier_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdTierPoint->load('user');

        return view('admin.thirdTierPoints.show', compact('thirdTierPoint'));
    }
}
