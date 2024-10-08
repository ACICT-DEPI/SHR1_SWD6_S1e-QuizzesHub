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
        $userId = $this->user()->id;
        return [
            'fname' => 'required',
            'lname' => 'required',
            'username' => ['required',Rule::unique('users', 'username')->ignore($userId, 'id')],
            'email' => ['required','email',Rule::unique('users', 'email')->ignore($userId, 'id')],
            'phone' => ['nullable', 'regex:/^(010|011|012|015)[0-9]{8}$/',Rule::unique('users', 'phone')->ignore($userId, 'id')],
            'gender' => 'required|in:M,F',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'university_id' => 'required|integer|exists:universities,id',
            'faculty_id' => 'required|integer|exists:faculties,id',
            'major_id' => ['required','integer', 'exists:majors,id'],
            'level_id' => 'required|integer|exists:levels,id',
        ];
    }
}
