<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUser extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'unique:users,username'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'password_confirmation' => ['required'],
        ];
    }
}
