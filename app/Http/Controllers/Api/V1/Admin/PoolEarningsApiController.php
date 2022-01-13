<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PoolEarningResource;
use App\Models\PoolEarning;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoolEarningsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pool_earning_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoolEarningResource(PoolEarning::with(['period', 'user'])->get());
    }

    public function show(PoolEarning $poolEarning)
    {
        abort_if(Gate::denies('pool_earning_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoolEarningResource($poolEarning->load(['period', 'user']));
    }
}
