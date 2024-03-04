<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
        $id = Auth::user()->id;

        return [
            'username' => ['required', 'string', 'unique:users,name,' . $id, 'min:3', "max:128", 'regex:/^[^\s]+$/'],
            'first_name' => ['required', 'string', 'min:3', "max:128"],
            'last_name' => ['required', 'string', 'min:3', "max:128"],
            'email' => ['required', 'unique:users,email,' . $id],
            'country' => ['required', Rule::exists('countries', 'id')],
            'state' => ['required', Rule::exists('states', 'id')],
            'city' => [Rule::exists('cities', 'id')],
            'phone_number' => ['required'],
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:5120', 'min:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone' => 'The :attribute field must be a valid number.',
            'username.regex' => 'The :attribute must have no space.',
        ];
    }
}
