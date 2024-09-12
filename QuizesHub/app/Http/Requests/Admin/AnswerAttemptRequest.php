<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class AnswerAttemptRequest extends FormRequest
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
    public function onUpdate(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'question_id' => ['required', 'integer'],
            'selected_answer_id' => ['required', 'integer'],
            'attempt_number' => ['required', 'integer'],
        ];
    }
    public function onCreate(): array
    {
        return [
            'id' => ['required', 'integer', 'unique:answer_attempts,id'],
            'user_id' => ['required', 'integer'],
            'question_id' => ['required', 'integer'],
            'selected_answer_id' => ['required', 'integer'],
            'attempt_number' => ['required', 'integer'],
        ];
    }
    public function rules(): array
    {
        if (@request()->isMethod('put')) {
            return $this->onUpdate();
        } else {
            return $this->onCreate();
        }
    }
    public function messages(): array
    {
        return [
            'user_id.required' => 'Please enter user id',
            'user_id.integer' => 'Invalid user id',
            'question_id.required' => 'Please enter question id',
            'question_id.integer' => 'Invalid question id',
            'selected_answer_id.required' => 'Please enter selected answer id',
            'selected_answer_id.integer' => 'Invalid selected answer id',
            'attempt_number.required' => 'Please enter attempt number',
            'attempt_number.integer' => 'Invalid attempt number',
        ];
    }
}
