<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                'delivery_address' => ['required', 'string', 'max:100'],
                'description' => ['required', 'string', 'max:255'],
                'total' => ['required', 'numeric', 'min:0']
            ];
        }
        return [
            'user_id' => ['required', 'exists:users,id'],
            'product_id' => ['required', 'exists:products,id'],
            'delivery_address' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
            'total' => ['required', 'numeric', 'min:0']
        ];
    }
}
