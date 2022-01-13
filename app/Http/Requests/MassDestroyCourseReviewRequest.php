<?php

namespace App\Http\Requests;

use App\Models\CourseReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseReviewRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_reviews,id',
        ];
    }
}
