<?php

namespace App\Http\Requests;

use App\Models\SignalUpdate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSignalUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('signal_update_create');
    }

    public function rules()
    {
        return [
            'trade_signal_id' => [
                'required',
                'integer',
            ],
            'update' => [
                'required',
            ],
        ];
    }
}
