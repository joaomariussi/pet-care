<?php

namespace App\Http\Requests\Employees;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EmployeesCreateRequest extends FormRequest
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
            'position_id' => 'required|exists:positions,id',
            'name' => 'required|max:191',
            'cpf' => 'required|max:14',
            'email' => 'required|email',
            'telephone' => 'required|max:15',
            'admission_date' => 'required',
        ];
    }

    /**
     * Prepara os dados para validação, removendo a máscara do CPF e do telefone.
     */
    protected function prepareForValidation(): void
    {
        // Remove as máscaras dos campos
        $this->merge([
            'cpf' => removeMask($this->cpf),
            'telephone' => removeMask($this->telephone),
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
            'position_id.required' => 'O cargo é obrigatório',
            'position_id.exists' => 'O cargo informado não existe',
            'name.required' => 'O nome é obrigatório',
            'name.max' => 'O nome deve ter no máximo 191 caracteres',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.max' => 'O CPF deve ter no máximo 14 caracteres',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Email inválido',
            'telephone.required' => 'O telefone é obrigatório',
            'telephone.max' => 'O telefone deve ter no máximo 15 caracteres',
            'admission_date.required' => 'A data de admissão é obrigatória',
        ];
    }
}
