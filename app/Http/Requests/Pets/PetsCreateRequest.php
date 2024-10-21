<?php

namespace App\Http\Requests\Pets;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PetsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'owner_id' => 'required|integer',
            'medical_history' => 'exists:medical_history_id',
            'name' => 'required|max:255',
            'date_birth' => 'required|date',
            'species' => 'required|max:255',
            'gender' => 'required',
            'color' => 'required|max:255',
            'weight' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
    }

    /**
     * Prepara os dados para validação
     */
    protected function prepareForValidation(): void
    {
        // Remove as máscaras dos campos
        $this->merge([
            'weight' => preg_replace('/[^0-9]/', '', $this->weight),
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'owner_id.required' => 'O campo proprietário é obrigatório.',
            'owner_id.integer' => 'O campo proprietário deve ser um número inteiro.',
            'medical_history.exists' => 'O campo histórico médico deve ser um ID válido.',
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'date_birth.required' => 'O campo data de nascimento é obrigatório.',
            'date_birth.date' => 'O campo data de nascimento deve ser uma data.',
            'species.required' => 'O campo espécie é obrigatório.',
            'species.max' => 'O campo espécie deve ter no máximo 255 caracteres',
            'gender.required' => 'O campo gênero é obrigatório.',
            'color.required' => 'O campo cor é obrigatório.',
            'color.max' => 'O campo cor deve ter no máximo 255 caracteres',
            'weight.required' => 'O campo peso é obrigatório.',
            'photo.image' => 'O campo foto deve ser uma imagem.',
            'photo.mimes' => 'O arquivo deve ser uma imagem do tipo: jpeg, png, jpg, gif, svg,webp',
        ];
    }
}
