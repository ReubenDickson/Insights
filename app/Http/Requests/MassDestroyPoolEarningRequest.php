<?php

namespace App\Http\Requests;

use App\Models\PoolEarning;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPoolEarningRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pool_earning_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pool_earnings,id',
        ];
    }
}
