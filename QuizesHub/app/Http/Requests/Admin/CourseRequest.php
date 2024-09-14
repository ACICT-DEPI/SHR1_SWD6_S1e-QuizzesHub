<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Admin\Course;

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

            'name' => ['required', 'string', 'unique:courses,name'],
            'code' => ['required', 'string', 'unique:courses,code', $this->uniqueCompositeRule()],


        ];
    }

    private function uniqueCompositeRule()
    {
        return function ($attribute, $value, $fail) {
            $exists = Course::where('name', $this->input('name'))
                               ->where('code', $this->input('code'))
                               ->exists();
            if ($exists) {
                $fail('Course already exists');
            }
        };
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter name',
            'name.string' => 'Invalid name',

            'name.unique' => 'Course already exists',



        ];
    }
}
