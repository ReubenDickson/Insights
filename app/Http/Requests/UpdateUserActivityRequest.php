<?php

namespace App\Http\Requests;

use App\Models\UserActivity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserActivityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_activity_edit');
    }

    public function rules()
    {
        return [
            'activity' => [
                'required',
            ],
        ];
    }
}
