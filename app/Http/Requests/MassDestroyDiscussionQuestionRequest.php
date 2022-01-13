<?php

namespace App\Http\Requests;

use App\Models\DiscussionQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDiscussionQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('discussion_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:discussion_questions,id',
        ];
    }
}
