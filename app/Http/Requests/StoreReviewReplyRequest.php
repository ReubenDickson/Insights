<?php

namespace App\Http\Requests;

use App\Models\ReviewReply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReviewReplyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('review_reply_create');
    }

    public function rules()
    {
        return [
            'review_id' => [
                'required',
                'integer',
            ],
            'reply' => [
                'required',
            ],
            'reviewer_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
