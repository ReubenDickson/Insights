<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTradeSignalRequest;
use App\Http\Requests\StoreTradeSignalRequest;
use App\Http\Requests\UpdateTradeSignalRequest;
use App\Models\TradeSignal;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TradeSignalsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('trade_signal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tradeSignals = TradeSignal::all();

        return view('admin.tradeSignals.index', compact('tradeSignals'));
    }

    public function create()
    {
        abort_if(Gate::denies('trade_signal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tradeSignals.create');
    }

    public function store(StoreTradeSignalRequest $request)
    {
        $tradeSignal = TradeSignal::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tradeSignal->id]);
        }

        return redirect()->route('admin.trade-signals.index');
    }

    public function edit(TradeSignal $tradeSignal)
    {
        abort_if(Gate::denies('trade_signal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tradeSignals.edit', compact('tradeSignal'));
    }

    public function update(UpdateTradeSignalRequest $request, TradeSignal $tradeSignal)
    {
        $tradeSignal->update($request->all());

        return redirect()->route('admin.trade-signals.index');
    }

    public function show(TradeSignal $tradeSignal)
    {
        abort_if(Gate::denies('trade_signal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tradeSignals.show', compact('tradeSignal'));
    }

    public function destroy(TradeSignal $tradeSignal)
    {
        abort_if(Gate::denies('trade_signal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tradeSignal->delete();

        return back();
    }

    public function massDestroy(MassDestroyTradeSignalRequest $request)
    {
        TradeSignal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('trade_signal_create') && Gate::denies('trade_signal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TradeSignal();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
