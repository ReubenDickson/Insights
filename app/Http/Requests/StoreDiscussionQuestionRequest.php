<?php

namespace App\Http\Requests;

use App\Models\DiscussionQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDiscussionQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discussion_question_create');
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
