<?php

namespace App\Http\Requests\admin;

use App\Models\Role;
use App\Rules\PasswordExistsRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PasswordRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'new_password' => ['required', 'min:8', 'max:128', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'new_password.required' => 'new password field is required',
            'new_password.min' => 'The new password field must be at least 3 characters.',
            'new_password.max' => 'The new password must not be greater than 128 characters.',
            'new_password.confirmed' => 'The new password and new password confirmation must match.',
        ];
    }
}
