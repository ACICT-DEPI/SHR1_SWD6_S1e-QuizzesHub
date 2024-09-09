<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function onUpdate(): array
    {
        return [
         'name'=>['required','string'],
         'code'=>['required','string'],
         'major_id'=>['required','integer'],
           
        ];
    }
    public function onCreate(): array
    {
        return [
            'id'=>['required','integer','unique:levels,id'],
            'name'=>['required','string'],
            'code'=>['required','string'],
            'major_id'=>['required','integer'],
           
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
            'id.required' => 'Please enter id',
            'id.unique'=>'this id already exist',
            'name.required' => 'Please enter name',
            'name.string' => 'Invalid name',
            'code.required' => 'Please enter code',
            'code.string' => 'Invalid code',
            'major_id.required' => 'Please enter major_id',
            'major_id.integer' => 'Invalid major_id',

        ];
    }
}
