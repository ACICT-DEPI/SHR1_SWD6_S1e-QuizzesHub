<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'type'=>['required', 'regex:/(mcq|essay|true_false)/'],
            'text'=>['required', 'regex:/a-zA-z0-9/'],
            'exam_id'=>['required', 'regex:/[0-9]+/'],
        ];
    }
}
