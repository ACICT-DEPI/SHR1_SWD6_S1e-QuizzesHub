<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            // 'role' => 'required|in:user,admin',
            'university_id' => 'required|integer',
            'faculty_id' => 'required|integer',
            'major_id' => 'required|integer',
            'level_id' => 'required|integer',
        ];
    }

    private function onUpdate(): array
    {
        $userId = $this->route('user');
        return [
            // Rule::unique('courses', 'name')->ignore($this->course)
            'fname' => 'required',
            'lname' => 'required',
            // 'username' => 'required||unique:users,username,'.$this->username.'username',
            'username' => 'required|unique:users,username,' .  $userId . ',id',
            'email' => 'required|email|unique:users,email,'.$userId.',id',
            'password' => 'nullable|string|min:8',
            'phone' => ['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/', 'unique:users,phone,'.$userId.',id'],
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'gender' => 'required|in:M,F',
            'score' => 'nullable|integer',
            // 'role' => 'required|in:user,admin',
            'university_id' => 'required|integer',
            'faculty_id' => 'required|integer',
            'major_id' => 'required|integer',
            'level_id' => 'required|integer',
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
