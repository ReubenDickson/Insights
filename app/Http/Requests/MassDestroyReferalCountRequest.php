<?php

namespace App\Http\Requests;

use App\Models\ReferalCount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReferalCountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('referal_count_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:referal_counts,id',
        ];
    }
}
