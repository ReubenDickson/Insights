<?php

namespace App\Http\Requests;

use App\Models\ReviewReply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReviewReplyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('review_reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:review_replies,id',
        ];
    }
}
