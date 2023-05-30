<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreate extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Please enter your name.',
            'name.string' => 'Name should be a string.',
            'name.max' => 'Name should not exceed 255 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'email.max' => 'Email address should not exceed 255 characters.',
            'password.required' => 'Please enter a password.',
            'password.string' => 'Password should be a string.',
            'password.min' => 'Password should be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
