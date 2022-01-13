<?php

namespace App\Http\Requests;

use App\Models\TradeSignal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTradeSignalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trade_signal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trade_signals,id',
        ];
    }
}
