<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SecondTierPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecondTierPointsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('second_tier_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secondTierPoints = SecondTierPoint::with(['user'])->get();

        return view('admin.secondTierPoints.index', compact('secondTierPoints'));
    }

    public function show(SecondTierPoint $secondTierPoint)
    {
        abort_if(Gate::denies('second_tier_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secondTierPoint->load('user');

        return view('admin.secondTierPoints.show', compact('secondTierPoint'));
    }
}
