<?php

namespace App\Http\Requests;

use App\Models\ThirdTierAfilliate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyThirdTierAfilliateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('third_tier_afilliate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:third_tier_afilliates,id',
        ];
    }
}
