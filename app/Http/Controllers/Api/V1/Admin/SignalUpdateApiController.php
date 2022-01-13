<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSignalUpdateRequest;
use App\Http\Requests\UpdateSignalUpdateRequest;
use App\Http\Resources\Admin\SignalUpdateResource;
use App\Models\SignalUpdate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SignalUpdateApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('signal_update_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SignalUpdateResource(SignalUpdate::with(['trade_signal'])->get());
    }

    public function store(StoreSignalUpdateRequest $request)
    {
        $signalUpdate = SignalUpdate::create($request->all());

        return (new SignalUpdateResource($signalUpdate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SignalUpdate $signalUpdate)
    {
        abort_if(Gate::denies('signal_update_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SignalUpdateResource($signalUpdate->load(['trade_signal']));
    }

    public function update(UpdateSignalUpdateRequest $request, SignalUpdate $signalUpdate)
    {
        $signalUpdate->update($request->all());

        return (new SignalUpdateResource($signalUpdate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SignalUpdate $signalUpdate)
    {
        abort_if(Gate::denies('signal_update_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $signalUpdate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
