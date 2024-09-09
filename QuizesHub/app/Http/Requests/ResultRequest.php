<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
            'user_id'=>['required', 'regex:/[0-9]+/'],
            'exam_id'=>['required', 'regex:/[0-9]+/'],
            'score'=>['required', 'regex:/[0-9]+/'],
            'total_score'=>['required', 'regex:/[0-9]+/'],
        ];
    }
}
