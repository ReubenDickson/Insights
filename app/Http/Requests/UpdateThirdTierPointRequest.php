<?php

namespace App\Http\Requests;

use App\Models\ThirdTierPoint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateThirdTierPointRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('third_tier_point_edit');
    }

    public function rules()
    {
        return [
            'point_count' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
