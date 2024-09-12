<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
            'question_id'=>['required', 'regex:/[0-9]+/'],
            'type'=>['required', 'regex:/(normal_text|image_path)/'],
            'text'=>['required', 'regex:/a-zA-z0-9/'],
            'is_correct'=>['required', 'regex:/(0|1)/'],
        ];
    }
}
