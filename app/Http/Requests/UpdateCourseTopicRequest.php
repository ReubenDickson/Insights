<?php

namespace App\Http\Requests;

use App\Models\CourseTopic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseTopicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_topic_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'topic' => [
                'string',
                'nullable',
            ],
            'photo' => [
                'array',
            ],
            'video_link' => [
                'string',
                'required',
            ],
        ];
    }
}
