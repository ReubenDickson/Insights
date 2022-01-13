<?php

namespace App\Http\Requests;

use App\Models\DiscussionAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDiscussionAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discussion_answer_edit');
    }

    public function rules()
    {
        return [];
    }
}
