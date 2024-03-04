<?php

namespace App\Http\Requests\admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $method = $this->method();
        switch ($method) {
            case 'put' :
                $id = $this->route()->user->id;
                return [
                    'username' => ['required', 'string', Rule::unique('users', 'name')->ignore($id, 'id'), 'min:3', "max:128", 'regex:/^[^\s]+$/'],
                    'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id, 'id')],
                    'role' => ['required', Rule::exists('roles', 'name')]
                ];
                break;
            default :
                return [
                    'username' => ['required', 'string', Rule::unique('users', 'name'), 'min:3', "max:128", 'regex:/^[^\s]+$/'],
                    'email' => ['required', 'email', Rule::unique('users', 'email')],
                    'role' => ['required', Rule::exists('roles', 'name')]
                ];
                break;
        }

    }

    public function messages(): array
    {
        return [
            'username.regex' => 'The :attribute must have no space.',
        ];
    }
}
