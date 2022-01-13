<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\FirstTierAfilliateResource;
use App\Models\FirstTierAfilliate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirstTierAfilliatesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('first_tier_afilliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FirstTierAfilliateResource(FirstTierAfilliate::with(['email'])->get());
    }

    public function show(FirstTierAfilliate $firstTierAfilliate)
    {
        abort_if(Gate::denies('first_tier_afilliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FirstTierAfilliateResource($firstTierAfilliate->load(['email']));
    }
}
