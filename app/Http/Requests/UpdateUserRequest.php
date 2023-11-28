<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'sometimes|required|max:255',
            'last_name' => 'nullable|max:255',

            'email' => 'sometimes|nullable|max:255|email|unique:users,email',
            'job_description' => 'nullable',
            'company' => 'nullable',
            'long' => 'nullable' ,
            'lat' => 'nullable',
            'access_token' => 'nullable',
            'profile_image' => 'required|image',
        ];

    }
}
