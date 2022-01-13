<?php

namespace App\Http\Requests;

use App\Models\CourseReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_review_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'review' => [
                'required',
            ],
            'stars' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
