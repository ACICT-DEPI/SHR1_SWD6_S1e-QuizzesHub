<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            
            'name' => ['required', 'string',
                Rule::unique('courses')->where(function ($query) {
                    return $query->where('major_id', $this->major_id)
                                 ->where('faculty_id', $this->faculty_id);

                })
                
                ],

            'major_id' => ['required', 'integer'],
            'faculty_id' => ['required', 'integer'],
            
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter name',
            'name.string' => 'Invalid name',
           
            'name.unique' => 'Course already exists',
            'major_id.required' => 'Please enter major_id',
            'major_id.integer' => 'Invalid major_id',
            'faculty_id.required' => 'Please enter faculty_id',
            'faculty_id.integer' => 'Invalid faculty_id',
           
            

        ];
    }
}
