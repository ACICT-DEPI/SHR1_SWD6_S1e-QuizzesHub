<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Helpers\ApiHelper;

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
    protected function failedValidation(Validator $validator)
    {
        if($this->is('api/*')){
            $response = ApiHelper::getResponse(422, 'Validation error', $validator->messages()->all());
            throw new ValidationException($validator, $response);
        }else{
            parent::failedValidation($validator);
        }
    }

    public function rules(): array
    {
        return [
            'type'=>['required', 'regex:/(final|midterm|oral)/'],
            'course_id'=>['required', 'regex:/[0-9]+/'],
            'faculty_id'=>['required', 'regex:/[0-9]+/'],
            'university_id'=>['required', 'regex:/[0-9]+/'],
            'date'=>['required', 'date'],
            'duration'=>['required', 'regex:/[0-9]+/'],
        ];
    }

    public function messages(): array
    {
        return [
            'type.*' => 'this field is required',
            'course_id.*' => 'this field is required',
            'faculty_id.*' => 'this field is required',
            'university_id.*' => 'this field is required',
            'date.*' => 'this field is required',
            'duration.*' => 'this field is required',
        ];
    }
}
