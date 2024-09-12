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
    public function rules(): array
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|password',
            'phone' => ['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/', 'unique:user,phone'],
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'gender' => 'M|F',
            'university_id' => 'required|integer',
            'faculty_id' => 'required|integer',
            'major_id' => 'required|integer',
            'level_id' => 'required|integer',
        ];
    }
}
