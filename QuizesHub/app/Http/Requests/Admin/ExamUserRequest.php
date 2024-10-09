<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Helpers\ApiHelper;

class ExamUserRequest extends FormRequest
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
            'user_id'=>['required', 'regex:/[0-9]+/'],
            'exam_id'=>['required', 'regex:/[0-9]+/'],
            'score'=>['required', 'regex:/[0-9]+/'],
            'completion_time' => ['required', 'integer'],
        ];
    }
}
