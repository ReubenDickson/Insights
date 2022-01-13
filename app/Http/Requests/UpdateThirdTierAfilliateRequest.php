<?php

namespace App\Http\Requests;

use App\Models\ThirdTierAfilliate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateThirdTierAfilliateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('third_tier_afilliate_edit');
    }

    public function rules()
    {
        return [
            'email_id' => [
                'required',
                'integer',
            ],
            'date_became_third_tier' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
