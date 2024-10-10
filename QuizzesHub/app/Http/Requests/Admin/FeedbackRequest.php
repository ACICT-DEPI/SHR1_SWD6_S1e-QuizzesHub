<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Helpers\ApiHelper;


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
    protected function failedValidation(Validator $validator)
    {
        if($this->is('api/*')){
            $response = ApiHelper::getResponse(422, 'Validation error', $validator->messages()->all());
            throw new ValidationException($validator, $response);
        }else{
            parent::failedValidation($validator);
        }
    }


    public function rules(): array
    {
        return [

            'user_id'=>['required','integer'],
            'exam_id'=>['required','integer'],
            'rating' =>['required', 'integer','between:1,10'],
            'comments' => ['required', 'string'],

        ];

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
            'rating.between' => 'Invalid rating (between 1 and 10)',
            'comments.required' => 'Please enter comments',
            'comments.string' => 'Invalid comments',

        ];
    }
}
