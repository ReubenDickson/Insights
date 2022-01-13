<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReferalCount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferalCountController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('referal_count_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referalCounts = ReferalCount::with(['user', 'sponsor'])->get();

        return view('admin.referalCounts.index', compact('referalCounts'));
    }

    public function show(ReferalCount $referalCount)
    {
        abort_if(Gate::denies('referal_count_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referalCount->load('user', 'sponsor');

        return view('admin.referalCounts.show', compact('referalCount'));
    }

    public function myreferrals(ReferalCount $referalCount){
        return view('admin.referalCounts.myreferrals', compact('referalCount'));
    }
}
