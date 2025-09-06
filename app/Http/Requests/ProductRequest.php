<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method() == "PUT") {

            return [
                'name' => ['required', 'string', 'max:20'],
                'price' => ['required', 'string', 'max:50'],
                'description' => ['required', 'string', 'max:14'],
                'available' => ['required', 'boolean']
            ];

        }

        return [
            'name' => ['required', 'string', 'max:20'],
            'price' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:14'],
            'available' => ['required', 'boolean']
        ];
    }
}
