<?php

namespace App\Http\Requests\Veterinarians;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class VeterinariansRequest extends FormRequest
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
            'name' => 'required|max:255',
            'cpf' => 'required|unique:veterinarians,cpf',
            'email' => 'required|email|unique:veterinarians,email',
            'cell_phone' => 'required|max:20',
            'crm' => 'required|unique:veterinarians,crm',
        ];
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
