<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
//        dd($this->all());
        $method = $this->method();
        switch ($method) {
            case 'PUT' :
                $id = $this->route()->product->id;
                dd($this->all());
                return [
                    'title' => ['required', 'string', Rule::unique('products', 'title')->ignore($id), 'min:3', "max:128"],
                    'description' => ['required', 'string', 'min:3', "max:1024"],
                    'images' => ['array'],
                    'images.*' => ['image','mimes:jpeg,jpg,png', 'max:5120', 'min:50'],
                    'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                    'quantity' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
                    'discountPercentage' => ['required', 'numeric','min:0', "max:100", 'regex:/^\d+(\.\d{1,2})?$/'],
                    'featured' => ['required', Rule::in(0, 1)],
                    'categories' => ['required', Rule::exists('categories', 'id'),'array'],
                    'categories.*' => [Rule::exists('categories', 'id')],
                ];
                break;
            default :
                return [
                    'title' => ['required', 'string', Rule::unique('products', 'title'), 'min:3', "max:128"],
                    'description' => ['required', 'string', 'min:3', "max:1024"],
                    'images' => ['required','array'],
                    'images.*' => ['image','mimes:jpeg,jpg,png', 'max:5120', 'min:50'],
                    'price' => ['required', 'numeric'],
                    'quantity' => ['required', 'numeric'],
                    'discountPercentage' => ['required', 'numeric'],
                    'featured' => ['required', Rule::in(0, 1)],
                    'selectedCategories' => ['required', Rule::exists('categories', 'id'),'array'],
                    'selectedCategories.*' => [Rule::exists('categories', 'id')],
                ];
                break;
        }

    }

}
