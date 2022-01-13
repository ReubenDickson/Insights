<?php

namespace App\Http\Requests;

use App\Models\SecondTierPoint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSecondTierPointRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('second_tier_point_create');
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
