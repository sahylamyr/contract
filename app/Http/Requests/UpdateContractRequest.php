<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'company' => ['required', 'string'],
            'date' => ['required', 'string'],
            'status' => ['nullable', 'boolean'],
            // 'file' => ['nullable', 'mimes:pdf,doc,docx,txt,png,jpg,jpeg']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Boş olmaz.',
            'company.required' => 'Şirkət seçin.',
            'category_id.required' => 'Kateqoriya seçin.',
            'date.required' => 'Tarix seçin.',
        ];
    }
}
