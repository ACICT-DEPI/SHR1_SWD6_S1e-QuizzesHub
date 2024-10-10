<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Admin\Course;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Helpers\ApiHelper;

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
    protected function failedValidation(Validator $validator)
    {
        if($this->is('api/*')){
            $response = ApiHelper::getResponse(422, 'Validation error', $validator->messages()->all());
            throw new ValidationException($validator, $response);
        }else{
            parent::failedValidation($validator);
        }
    }
    public function uniqueCompositeRule()
    {
        return Rule::unique('courses', 'code');
    }
    public function onCreate(): array
    {
        return [

            'name' => ['required', 'string', 'unique:courses,name'],
            'code' => ['required', 'string', 'unique:courses,code', $this->uniqueCompositeRule()],

        ];
    }

    public function onUpdate(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('courses', 'name')->ignore($this->course), $this->uniqueCompositeRule()],
            'code' => ['required', 'string', 'max:255', Rule::unique('courses', 'code')->ignore($this->course)],

        ];
    }

    public function rules(): array
    {
        if ($this->isMethod('put')) {
            return $this->onUpdate();
        }

        return $this->onCreate();
    }



    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a name.',
            'name.string' => 'The name must be a valid string.',
            'name.unique' => 'A course with this name already exists.',
            'code.required' => 'Please enter a code.',
            'code.unique' => 'A course with this code already exists.',
            'degree.required' => 'Please enter a degree.',
            'major_id.required' => 'Please select a major.',
            'faculty_id.required' => 'Please select a faculty.',
        ];
    }
}

