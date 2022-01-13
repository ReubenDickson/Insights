<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SecondTierPointResource;
use App\Models\SecondTierPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecondTierPointsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('second_tier_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecondTierPointResource(SecondTierPoint::with(['user'])->get());
    }

    public function show(SecondTierPoint $secondTierPoint)
    {
        abort_if(Gate::denies('second_tier_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecondTierPointResource($secondTierPoint->load(['user']));
    }
}
