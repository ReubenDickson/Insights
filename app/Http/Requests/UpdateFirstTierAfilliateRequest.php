<?php

namespace App\Http\Requests;

use App\Models\FirstTierAfilliate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFirstTierAfilliateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('first_tier_afilliate_edit');
    }

    public function rules()
    {
        return [
            'date_became_first_tier' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
