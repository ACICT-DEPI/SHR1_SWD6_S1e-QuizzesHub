<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
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
         'faculty_id'=>['required','integer']
           
        ];
    }
    public function onCreate(): array
    {
        return [
            'id'=>['required','integer','unique:majors,id'],
            'name'=>['required','string'],
            'faculty_id'=>['required','integer']
           
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
            'faculty_id.required' => 'Please enter faculty id',
            'faculty_id.integer' => 'Invalid faculty id',

           
        ];
    }
}
