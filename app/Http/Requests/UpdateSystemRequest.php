<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSystemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Unchecked checkboxes are not submitted, so a missing value means inactive.
     */
    protected function prepareForValidation(): void
    {
        $this->merge(['active' => $this->boolean('active')]);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'active' => ['boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'url' => 'URL',
            'active' => 'ativo',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser um texto.',
            'url' => 'O campo :attribute deve ser uma URL válida.',
            'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
            'max' => 'O campo :attribute excede o valor ou tamanho máximo permitido.',
        ];
    }
}
