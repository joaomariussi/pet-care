<?php

namespace App\Http\Requests\site;

use Illuminate\Foundation\Http\FormRequest;

class ContactsCreateRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'cnpj'          => 'max:191|unique:contacts,cnpj',
            'phone_number'  => 'required|string|max:255',
            'city_name'     => 'required|string|max:255',
            'state_uf'      => 'required|string|max:255',
            'subject'       => 'required|string|max:255',
            'message'       => 'required|string|max:255',
            'sector_id'     => 'required|integer'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required'         => 'O campo nome é obrigatório.',
            'name.string'           => 'O nome deve ser uma string.',
            'name.max'              => 'O nome não pode ter mais de 255 caracteres.',
            'email.required'        => 'O campo e-mail é obrigatório.',
            'email.email'           => 'O e-mail deve ser um e-mail válido.',
            'email.max'             => 'O e-mail não pode ter mais de 255 caracteres.',
            'cnpj.max'              => 'O CNPJ não pode ter mais de 191 caracteres.',
            'cnpj.unique'           => 'O CNPJ já está em uso.',
            'phone_number.required' => 'O campo telefone é obrigatório.',
            'phone_number.string'   => 'O telefone deve ser uma string.',
            'phone_number.max'      => 'O telefone não pode ter mais de 255 caracteres.',
            'city_name.required'    => 'O campo cidade é obrigatório.',
            'city_name.string'      => 'A cidade deve ser uma string.',
            'city_name.max'         => 'A cidade não pode ter mais de 255 caracteres.',
            'state_uf.required'     => 'O campo estado é obrigatório.',
            'state_uf.string'       => 'O estado deve ser uma string.',
            'state_uf.max'          => 'O estado não pode ter mais de 255 caracteres.',
            'subject.required'      => 'O campo assunto é obrigatório.',
            'subject.string'        => 'O assunto deve ser uma string.',
            'subject.max'           => 'O assunto não pode ter mais de 255 caracteres.',
            'message.required'      => 'O campo mensagem é obrigatório.',
            'message.string'        => 'A mensagem deve ser uma string.',
            'message.max'           => 'A mensagem não pode ter mais de 255 caracteres.',
            'sector_id.required'    => 'O campo setor é obrigatório.',
            'sector_id.integer'     => 'O setor deve ser um inteiro.'
        ];
    }
}
