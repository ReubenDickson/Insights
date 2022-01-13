<?php

namespace App\Http\Requests;

use App\Models\TradeSignal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTradeSignalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trade_signal_edit');
    }

    public function rules()
    {
        return [
            'crypto_pair' => [
                'string',
                'required',
            ],
            'entry' => [
                'string',
                'required',
            ],
            'exit' => [
                'string',
                'required',
            ],
            'stop_loss' => [
                'string',
                'required',
            ],
        ];
    }
}
