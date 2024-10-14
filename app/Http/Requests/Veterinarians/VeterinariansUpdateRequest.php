<?php

namespace App\Http\Requests\Veterinarians;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class VeterinariansUpdateRequest extends FormRequest
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
        // Obtém o ID do veterinário da rota pelo nome do parâmetro {id}
        $veterinarianId = $this->route('id');

        return [
            'name' => 'required|max:255',
            'cpf' => 'required|unique:veterinarians,cpf,' . $veterinarianId, 'id',
            'email' => 'required|email|unique:veterinarians,email,' . $veterinarianId, 'id',
            'cell_phone' => 'required|max:20',
            'crm' => 'required|unique:veterinarians,crm,' . $veterinarianId, 'id',
        ];
    }

    /**
     * Prepara os dados para validação, removendo a máscara do CPF.
     */
    protected function prepareForValidation(): void
    {
        // Remove as máscaras dos campos
        $this->merge([
            'cpf' => preg_replace('/\D/', '', $this->cpf),
            'cell_phone' => preg_replace('/\D/', '', $this->cell_phone),
            'crm' => preg_replace("/[^0-9A-Za-z]/", "", $this->crm),
        ]);
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'cell_phone.required' => 'O campo telefone é obrigatório.',
            'cell_phone.max' => 'O campo telefone deve ter no máximo 20 caracteres.',
            'crm.required' => 'O campo CRM é obrigatório.',
            'crm.unique' => 'Este CRM já está cadastrado.',
        ];
    }
}
