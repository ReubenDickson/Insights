<?php

namespace App\Http\Requests;

use App\Models\PoolEarning;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePoolEarningRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pool_earning_create');
    }

    public function rules()
    {
        return [
            'period_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'direct_referal_earnings' => [
                'required',
            ],
            'first_tier_earnings' => [
                'required',
            ],
            'second_tier_earnings' => [
                'required',
            ],
            'third_tier_earnings' => [
                'required',
            ],
        ];
    }
}
