<?php

namespace App\Http\Requests;

use App\Models\CourseRating;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseRatingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_rating_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'average_ratings' => [
                'numeric',
            ],
            'total_reviews' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_stars' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
