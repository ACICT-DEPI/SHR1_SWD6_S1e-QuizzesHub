<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LevelRequest extends FormRequest
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
    public function onCreate(){
        return [
            
            'name' => ['required', 'string', 'max:255', 'unique:levels,name'],
            'description' => ['required', 'string', 'max:255']
        ];

    }
    public function onUpdate(){
        return [
            
            'name' => ['required', 'string', 'max:255', Rule::unique('levels')->ignore($this->level)],
            'description' => ['required', 'string', 'max:255']
        ];
        
    }
 
    
    public function rules(): array
    {
        if($this->ismethod('put')){
            return $this->onUpdate();
        }else{
            return $this->onCreate();
        }
       
    }
    public function messages(): array
    {
        return [
          
            'name.required' => 'Please enter name',
            'name.string' => 'Invalid name',
            'name.unique' => 'Name already exists',
            'description.required' => 'Please enter description',
            'description.string' => 'Invalid description',

        ];
    }
}
