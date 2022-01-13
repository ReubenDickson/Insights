<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReferalCountResource;
use App\Models\ReferalCount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferalCountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('referal_count_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferalCountResource(ReferalCount::with(['user', 'sponsor'])->get());
    }

    public function show(ReferalCount $referalCount)
    {
        abort_if(Gate::denies('referal_count_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferalCountResource($referalCount->load(['user', 'sponsor']));
    }
}
