<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name'=>['required','string'],
            'code'=>['required','string'],
            'major_id'=>['required','integer'],
 
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter name',
            'name.string' => 'Invalid name',
            'name.unique' => 'Course already exists',
            'code.required' => 'Please enter code',
            'code.string' => 'Invalid code',
            'code.unique' => 'Course already exists',
            'major_id.required' => 'Please enter major_id',
            'major_id.integer' => 'Invalid major_id',

        ];
    }
}
