<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ThirdTierAfilliateResource;
use App\Models\ThirdTierAfilliate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThirdTierAfilliatesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('third_tier_afilliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThirdTierAfilliateResource(ThirdTierAfilliate::with(['email'])->get());
    }

    public function show(ThirdTierAfilliate $thirdTierAfilliate)
    {
        abort_if(Gate::denies('third_tier_afilliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThirdTierAfilliateResource($thirdTierAfilliate->load(['email']));
    }
}
