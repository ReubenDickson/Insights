<?php

namespace App\Http\Requests;

use App\Models\DiscussionAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDiscussionAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('discussion_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:discussion_answers,id',
        ];
    }
}
