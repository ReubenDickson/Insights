<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PoolEarning;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoolEarningsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pool_earning_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolEarnings = PoolEarning::with(['period', 'user'])->get();

        return view('admin.poolEarnings.index', compact('poolEarnings'));
    }

    public function show(PoolEarning $poolEarning)
    {
        abort_if(Gate::denies('pool_earning_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolEarning->load('period', 'user');

        return view('admin.poolEarnings.show', compact('poolEarning'));
    }
}
