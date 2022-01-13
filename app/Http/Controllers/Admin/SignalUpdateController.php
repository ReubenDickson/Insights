<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySignalUpdateRequest;
use App\Http\Requests\StoreSignalUpdateRequest;
use App\Http\Requests\UpdateSignalUpdateRequest;
use App\Models\SignalUpdate;
use App\Models\TradeSignal;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SignalUpdateController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('signal_update_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $signalUpdates = SignalUpdate::with(['trade_signal'])->get();

        $trade_signals = TradeSignal::get();

        return view('admin.signalUpdates.index', compact('signalUpdates', 'trade_signals'));
    }

    public function create()
    {
        abort_if(Gate::denies('signal_update_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trade_signals = TradeSignal::pluck('crypto_pair', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.signalUpdates.create', compact('trade_signals'));
    }

    public function store(StoreSignalUpdateRequest $request)
    {
        $signalUpdate = SignalUpdate::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $signalUpdate->id]);
        }

        return redirect()->route('admin.signal-updates.index');
    }

    public function edit(SignalUpdate $signalUpdate)
    {
        abort_if(Gate::denies('signal_update_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trade_signals = TradeSignal::pluck('crypto_pair', 'id')->prepend(trans('global.pleaseSelect'), '');

        $signalUpdate->load('trade_signal');

        return view('admin.signalUpdates.edit', compact('signalUpdate', 'trade_signals'));
    }

    public function update(UpdateSignalUpdateRequest $request, SignalUpdate $signalUpdate)
    {
        $signalUpdate->update($request->all());

        return redirect()->route('admin.signal-updates.index');
    }

    public function show(SignalUpdate $signalUpdate)
    {
        abort_if(Gate::denies('signal_update_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $signalUpdate->load('trade_signal');

        return view('admin.signalUpdates.show', compact('signalUpdate'));
    }

    public function destroy(SignalUpdate $signalUpdate)
    {
        abort_if(Gate::denies('signal_update_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $signalUpdate->delete();

        return back();
    }

    public function massDestroy(MassDestroySignalUpdateRequest $request)
    {
        SignalUpdate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('signal_update_create') && Gate::denies('signal_update_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SignalUpdate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
