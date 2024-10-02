<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedBackRequest extends FormRequest
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
            'rating' => ['required'],
            'comment' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'rating.required' => 'this field is required',
            'comment.required' => 'this field is required',
        ];
    }
}
