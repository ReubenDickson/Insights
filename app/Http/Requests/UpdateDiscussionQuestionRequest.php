<?php

namespace App\Http\Requests;

use App\Models\DiscussionQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDiscussionQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discussion_question_edit');
    }

    public function rules()
    {
        return [
            'question' => [
                'required',
            ],
        ];
    }
}
