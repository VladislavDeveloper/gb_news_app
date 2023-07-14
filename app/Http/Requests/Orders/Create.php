<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer' => ['required', 'string', 'min: 2', 'max: 50'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'order' => ['nullable', 'string', 'max: 2000']
        ];
    }
}
