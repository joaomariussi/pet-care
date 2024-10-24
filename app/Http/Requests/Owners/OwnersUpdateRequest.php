<?php

namespace App\Http\Requests\Owners;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OwnersUpdateRequest extends FormRequest
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
        // Obtém o ID do proprietário da rota pelo nome do parâmetro {id}
        $ownerId = $this->route('id');

        return [
            'name' => 'required|max:191',
            'cpf' => 'required|max:14|unique:owners,cpf,' . $ownerId, 'id',
            'email' => 'required|email|unique:owners,email,' . $ownerId, 'id',
            'telephone' => 'required|max:15',
            'cell_phone' => 'max:15',
            'date_birth' => 'required',
            'gender' => 'required',
            'address' => 'required|max:191',
            'neighborhood' => 'required|max:191',
            'number' => 'max:10',
            'complement' => 'max:100',
            'zip_code' => 'required|max:9',
            'city' => 'required|max:191',
            'state' => 'required|max:2',
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
            'telephone' => preg_replace("/[^0-9]/", "", $this->telephone),
            'cell_phone' => preg_replace("/[^0-9]/", "", $this->cell_phone),
            'zip_code' => preg_replace("/[^0-9]/", "", $this->zip_code),
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
            'name.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.max' => 'O CPF deve ter no máximo 14 caracteres',
            'cpf.unique' => 'Este CPF já está em uso',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Email inválido',
            'email.unique' => 'Este email já está em uso',
            'telephone.required' => 'O telefone é obrigatório',
            'telephone.max' => 'O telefone deve ter no máximo 15 caracteres',
            'cell_phone.max' => 'O celular deve ter no máximo 15 caracteres',
            'date_birth.required' => 'A data de nascimento é obrigatória',
            'gender.required' => 'O gênero é obrigatório',
            'address.required' => 'O endereço é obrigatório',
            'neighborhood.required' => 'O bairro é obrigatório',
            'number.max' => 'O número deve ter no máximo 10 caracteres',
            'zip_code.required' => 'O CEP é obrigatório',
            'zip_code.max' => 'O CEP deve ter no máximo 9 caracteres',
            'city.required' => 'A cidade é obrigatória',
            'state.required' => 'O estado é obrigatório',
        ];
    }
}
