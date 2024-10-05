<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        // dd("x");
        return [
            'comment_text' => ['required', 'string', 'max:1000'],
            // 'user_id' => ['required', 'integer'],
            'question_id' => ['required', 'integer'],
            'parent_id' => ['nullable','integer'],
        ];
    }

    public function messages(): array 
    {
        return [
            'comment_text.required' => 'comment_text field is required',
            'user_id.required' => 'user_id field is required',
            'question_id.required' => 'question_id field is required',
            'parent_id.required' => 'parent_id field is required',
        ];
    }
}
