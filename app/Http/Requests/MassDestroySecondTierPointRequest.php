<?php

namespace App\Http\Requests;

use App\Models\SecondTierPoint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySecondTierPointRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('second_tier_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:second_tier_points,id',
        ];
    }
}
