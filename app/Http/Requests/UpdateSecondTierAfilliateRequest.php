<?php

namespace App\Http\Requests;

use App\Models\SecondTierAfilliate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSecondTierAfilliateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('second_tier_afilliate_edit');
    }

    public function rules()
    {
        return [
            'email_id' => [
                'required',
                'integer',
            ],
            'date_became_second_tier' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
