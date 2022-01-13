<?php

namespace App\Http\Requests;

use App\Models\ReferalCount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReferalCountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('referal_count_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
