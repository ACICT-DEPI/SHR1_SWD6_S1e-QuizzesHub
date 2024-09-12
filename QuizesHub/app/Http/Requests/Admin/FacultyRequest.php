<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\Faculty;
use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'university_id' => ['required', 'integer',$this->uniqueCompositeRule()],
        ];
    }

    private function uniqueCompositeRule()
    {
        return function ($attribute, $value, $fail) {
            $exists = Faculty::where('name', $this->input('name'))
                               ->where('university_id', $this->input('university_id'))
                               ->exists();
            if ($exists) {
                $fail('This Faculty already exists for this University');
            }
        };
    }
}
