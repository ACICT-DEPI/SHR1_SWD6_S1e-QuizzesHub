<?php

namespace App\Http\Requests\Admin;

use App\Helpers\ApiHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
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
    protected function failedValidation(Validator $validator)
    {
        if($this->is('api/*')){
            $response = ApiHelper::getResponse(422, 'Validation error', $validator->messages()->all());
            throw new ValidationException($validator, $response);
        }else{
            parent::failedValidation($validator);
        }
    }

    private function onCreate(): array
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => ['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/', 'unique:users,phone'],
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'gender' => 'required|in:M,F',
            'role' => 'nullable|in:user,admin',
            'university_id' => 'required|integer|exists:universities,id',
            'faculty_id' => 'required|integer|exists:faculties,id',
            'major_id' => 'required|integer|exists:majors,id',
            'level_id' => 'required|integer|exists:levels,id',
        ];
    }

    private function onUpdate(): array
    {
        $userId = $this->route('user');
        return [
            'fname' => 'required',
            'lname' => 'required',
            // 'username' => 'required||unique:users,username,'.$this->username.'username',
            'username' => ['required',Rule::unique('users', 'username')->ignore($userId, 'id')],
            'email' => ['required','email',Rule::unique('users', 'email')->ignore($userId, 'id')],
            'password' => 'nullable|string|min:8',
            'phone' => ['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/',Rule::unique('users', 'phone')->ignore($userId, 'id')],
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'gender' => 'required|in:M,F',
            'score' => 'nullable|integer',
            'role' => 'nullable|in:user,admin',
            'university_id' => 'required|integer|exists:universities,id',
            'faculty_id' => 'required|integer|exists:faculties,id',
            'major_id' => ['required','integer', 'exists:majors,id'],
            'level_id' => 'required|integer|exists:levels,id',

        ];
    }
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return $this->onCreate();
        } else {
            return $this->onUpdate();
        }
    }
}
