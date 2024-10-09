<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewExamRequest extends FormRequest
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
        // dd($this->files);
        return [
            'university_id' => ['required', 'integer', 'exists:universities,id'],
            'faculty_id' => ['required', 'integer', 'exists:faculties,id'],
            'major_id' => ['required', 'integer', 'exists:majors,id'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'type'=>['required', 'regex:/(final|midterm|oral|sheet)/'],
            'file' => ['required', 'mimes:pdf,docx', 'max:10000'],
        ];
    }

    public function messages(): array 
    {
        return [
            'university_id.required' => 'the university is required',
            'faculty_id.required' => 'the faculty is required',
            'major_id.required' => 'the major is required',
            'course_id.required' => 'the course is required',
            'type.required' => 'the type is required',
            'file.required' => 'the file is required',
        ];
    }
}
