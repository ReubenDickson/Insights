<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\FirstTierPointResource;
use App\Models\FirstTierPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirstTierPointsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('first_tier_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FirstTierPointResource(FirstTierPoint::with(['user'])->get());
    }

    public function show(FirstTierPoint $firstTierPoint)
    {
        abort_if(Gate::denies('first_tier_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FirstTierPointResource($firstTierPoint->load(['user']));
    }
}
