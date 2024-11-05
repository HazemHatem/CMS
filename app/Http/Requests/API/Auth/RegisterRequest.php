<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
            'phone' => 'required|numeric|digits_between:10,15|unique:users,phone',
            'role_id' => 'nullable|numeric|in:1,2',
        ];
    }
}
