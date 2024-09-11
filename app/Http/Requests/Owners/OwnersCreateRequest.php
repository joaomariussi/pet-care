<?php

namespace App\Http\Requests\Owners;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OwnersCreateRequest extends FormRequest
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
            'nome' => 'required|max:191',
            'cpf' => 'required|max:14',
            'email' => 'required|max:191',
            'telefone' => 'required|max:15',
            'celular' => 'max:15',
            'data_nasc' => 'required',
            'genero' => 'required',
            'endereco' => 'required|max:191',
            'bairro' => 'required|max:191',
            'numero' => 'required|max:10',
            'cep' => 'required|max:9',
            'cidade' => 'required|max:191',
            'estado' => 'required|max:2',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.max' => 'O CPF deve ter no máximo 14 caracteres',
            'email.required' => 'O email é obrigatório',
            'telefone.required' => 'O telefone é obrigatório',
            'telefone.max' => 'O telefone deve ter no máximo 15 caracteres',
            'celular.max' => 'O celular deve ter no máximo 15 caracteres',
            'data_nasc.required' => 'A data de nascimento é obrigatória',
            'genero.required' => 'O gênero é obrigatório',
            'endereco.required' => 'O endereço é obrigatório',
            'bairro.required' => 'O bairro é obrigatório',
            'numero.required' => 'O número é obrigatório',
            'cep.required' => 'O CEP é obrigatório',
            'cep.max' => 'O CEP deve ter no máximo 9 caracteres',
            'cidade.required' => 'A cidade é obrigatória',
            'estado.required' => 'O estado é obrigatório',
        ];
    }
}
