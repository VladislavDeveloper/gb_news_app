<?php

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'title' => ['required', 'string', 'min: 2', 'max: 200'],
            'author' => ['nullable', 'string', 'min: 2', 'max: 100'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:categories,id'],
            'image' => ['sometimes'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'description' => ['nullable', 'string', 'max: 5000']
        ];
    }

    public function getCategories(): array
    {
        return $this->validated('categories');
    }
}
