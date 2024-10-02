<?php

namespace App\Http\Requests;

use App\Models\Admin\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'username' => ['required',Rule::unique('users', 'username')->ignore($this->username, 'username')],
            'email' => ['required','email',Rule::unique('users', 'email')->ignore($this->email, 'email')],
            'phone' => ['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/',Rule::unique('users', 'phone')->ignore($this->phone, 'phone')],
            'gender' => 'required|in:M,F',
            'university_id' => 'required|integer',
            'faculty_id' => 'required|integer',
            'major_id' => 'required|integer',
            'level_id' => 'required|integer',
        ];
    }
}
