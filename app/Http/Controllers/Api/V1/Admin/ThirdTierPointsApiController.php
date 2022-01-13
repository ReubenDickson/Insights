<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ThirdTierPointResource;
use App\Models\ThirdTierPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThirdTierPointsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('third_tier_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThirdTierPointResource(ThirdTierPoint::with(['user'])->get());
    }

    public function show(ThirdTierPoint $thirdTierPoint)
    {
        abort_if(Gate::denies('third_tier_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThirdTierPointResource($thirdTierPoint->load(['user']));
    }
}
