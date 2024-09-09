<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
 

class FeedbackRequest extends FormRequest
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
            'exam_id' => ['required', 'integer'],
            'rating' =>['required', 'integer'],
            'comments' => ['required', 'string'],
           
        ];
    }
    public function onCreate(): array
    {
        return [
            'id'=>['required','integer','unique:feedbacks,id'],
            'user_id'=>['required','integer'],
            'exam_id'=>['required','integer'],
            'rating' =>['required', 'integer'],
            'comments' => ['required', 'string'],
           
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
            'user_id.required' => 'Please enter user id',
            'user_id.integer' => 'Invalid user id',
            'exam_id.required' => 'Please enter exam id',
            'exam_id.integer' => 'Invalid exam id',
            'rating.required' => 'Please enter rating',
            'rating.integer' => 'Invalid rating',
            'comments.required' => 'Please enter comments',
            'comments.string' => 'Invalid comments',
           
        ];
    }
}
