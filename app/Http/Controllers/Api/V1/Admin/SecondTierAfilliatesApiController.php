<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SecondTierAfilliateResource;
use App\Models\SecondTierAfilliate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecondTierAfilliatesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('second_tier_afilliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecondTierAfilliateResource(SecondTierAfilliate::with(['email'])->get());
    }

    public function show(SecondTierAfilliate $secondTierAfilliate)
    {
        abort_if(Gate::denies('second_tier_afilliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecondTierAfilliateResource($secondTierAfilliate->load(['email']));
    }
}
