<?php

namespace App\Http\Requests;

use App\Models\Announcement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnnouncementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('announcement_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
