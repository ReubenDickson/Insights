<?php

namespace App\Http\Requests;

use App\Models\SignalUpdate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySignalUpdateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('signal_update_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:signal_updates,id',
        ];
    }
}
