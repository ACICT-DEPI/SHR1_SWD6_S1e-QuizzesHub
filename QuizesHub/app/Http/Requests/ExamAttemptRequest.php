<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamAttemptRequest extends FormRequest
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
            'user_id'=>['required','integer'],
            'exam_id'=>['required','integer'],
            'attempt_number'=>['required','integer'],
            'start_time'=>['required','date'],
            'end_time'=>['required','after:start_time'],
            'score'=>['required','integer']
           
        ];
    }
    public function onCreate(): array
    {
        return [
            'id'=>['required','integer','unique:exam_attempts,id'],
            'user_id'=>['required','integer'],
            'exam_id'=>['required','integer'],
            'attempt_number'=>['required','integer'],
            'start_time'=>['required','date'],
            'end_time'=>['required','after:start_time'],
           
        ];
    }
    public function rules(): array
    {
      if(@request()->isMethod('put')){
        return $this->onUpdate();
      }else{
        return $this->onCreate();
      }
    }
    public function messages(): array
    {
        return [
            'id.required'=>'Please enter id',
            'id.integer'=>'Invalid id',
            'id.unique'=>'Id already exist',
            'user_id.required'=>'Please enter user id',
            'user_id.integer'=>'Invalid user id',
            'exam_id.required'=>'Please enter exam id',
            'exam_id.integer'=>'Invalid exam id',
            'attempt_number.required'=>'Please enter attempt number',
            'attempt_number.integer'=>'Invalid attempt number',
            'start_time.required'=>'Please enter start time',
            'start_time.date'=>'Invalid start time',
            'end_time.required'=>'Please enter end time',
            'end_time.after'=>'Invalid end time',
           
        ];
    }
}
