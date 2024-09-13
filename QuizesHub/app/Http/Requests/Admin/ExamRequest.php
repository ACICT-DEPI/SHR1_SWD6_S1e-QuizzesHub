<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'=>['required', 'regex:/(final|midterm|oral)/'],
            'course_name'=>['required'],
            'course_id'=>['required', 'regex:/[0-9]+/'],
            'faculty_id'=>['required', 'regex:/[0-9]+/'],
            'university_id'=>['required', 'regex:/[0-9]+/'],
            'date'=>['required', 'date'],
            'duration'=>['required', 'regex:/[0-9]+/'],
        ];
    }
}
