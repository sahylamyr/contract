<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],
            'slug' => ['required', 'min:3', 'unique:categories,slug'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Kateqoriya adı boş olmaz.',
            'name.min' => 'Minimum 3 hərf olmalıdır.',
            'slug.min' => 'Minimum 3 hərf olmalıdır.',
            'slug.required' => 'Slug (url) boş olmaz.',
        ];
    }
}
