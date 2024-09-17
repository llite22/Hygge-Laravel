<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'department' => 'required|string',
            'message' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please provide your name.',
            'name.string' => 'The name must be a string.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'The email address must be a valid email address.',
            'email.unique' => 'The email address is already taken.',
            'phone.required' => 'Phone number is optional.',
            'phone.string' => 'The phone number must be a string.',
            'department.required' => 'Please specify the department.',
            'department.string' => 'The department must be a string.',
            'message.required' => 'Please provide a message.',
            'message.string' => 'The message must be a string.',
        ];
    }
}
