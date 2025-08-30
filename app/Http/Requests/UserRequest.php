<?php

namespace App\Http\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method() == "PUT") {
            return [
                'nameEdit' => ['required', 'string', 'max:20'],
                'lastnameEdit' => ['required', 'string', 'max:50'],
                'phoneEdit' => ['required', 'string', 'max:14'],
                'addressEdit' => ['required', 'string', 'max:50'],
                'emailEdit' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:' . User::class.',email,'.$this->id],
            ];
        }

        return [
            'name' => ['required', 'string', 'max:20'],
            'lastname' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:14'],
            'address' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }
}
