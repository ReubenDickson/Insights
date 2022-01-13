<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTradeSignalRequest;
use App\Http\Requests\UpdateTradeSignalRequest;
use App\Http\Resources\Admin\TradeSignalResource;
use App\Models\TradeSignal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TradeSignalsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('trade_signal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TradeSignalResource(TradeSignal::all());
    }

    public function store(StoreTradeSignalRequest $request)
    {
        $tradeSignal = TradeSignal::create($request->all());

        return (new TradeSignalResource($tradeSignal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TradeSignal $tradeSignal)
    {
        abort_if(Gate::denies('trade_signal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TradeSignalResource($tradeSignal);
    }

    public function update(UpdateTradeSignalRequest $request, TradeSignal $tradeSignal)
    {
        $tradeSignal->update($request->all());

        return (new TradeSignalResource($tradeSignal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TradeSignal $tradeSignal)
    {
        abort_if(Gate::denies('trade_signal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tradeSignal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
