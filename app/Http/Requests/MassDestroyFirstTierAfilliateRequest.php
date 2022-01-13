<?php

namespace App\Http\Requests;

use App\Models\FirstTierAfilliate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFirstTierAfilliateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('first_tier_afilliate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:first_tier_afilliates,id',
        ];
    }
}
