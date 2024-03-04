<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            case 'PUT' :
                $id = $this->route()->category->id;
                return [
                    'title' => ['required', 'string', Rule::unique('categories', 'title')->ignore($id), 'min:3', "max:128"],
                    'description' => ['required', 'string', 'min:3', "max:1024"],
                    'image' => ['image', 'mimes:jpeg,jpg,png', 'max:5120', 'min:50'],
                ];
                break;
            default :
                return [
                    'title' => ['required', 'string', 'unique:categories,title', 'min:3', "max:128"],
                    'description' => ['required', 'string', 'min:3', "max:1024"],
                    'image' => ['image', 'mimes:jpeg,jpg,png', 'max:5120', 'min:50'],
                ];
                break;
        }

    }

}
