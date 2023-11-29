<?php

namespace App\Http\Requests\site;

use Illuminate\Foundation\Http\FormRequest;

class ResumesCreateRequest extends FormRequest
{

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:60',
            'email' => 'required|string|unique:resumes,email,NULL,id,job_id,' . $this->route('id') . '|max:60',
            'phone' => 'required|string|max:60',
            'birth_date' => 'required|string|max:60',
            'city' => 'required|string|max:60',
            'state' => 'required|string|max:60',
            'file_pdf' => 'required|mimes:pdf|max:10240'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {

        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome não pode ter mais de 60 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser uma string.',
            'email.unique' => 'Você já enviou um formulário para esta vaga. Utilize outro e-mail.',
            'email.max' => 'O e-mail não pode ter mais de 60 caracteres.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'phone.string' => 'O telefone deve ser uma string.',
            'phone.max' => 'O telefone não pode ter mais de 60 caracteres.',
            'birth_date.required' => 'O campo data de nascimento é obrigatório.',
            'birth_date.string' => 'A data de nascimento deve ser uma string.',
            'birth_date.max' => 'A data de nascimento não pode ter mais de 60 caracteres.',
            'city.required' => 'O campo cidade é obrigatório.',
            'city.string' => 'A cidade deve ser uma string.',
            'city.max' => 'A cidade não pode ter mais de 60 caracteres.',
            'state.required' => 'O campo estado é obrigatório.',
            'state.string' => 'O estado deve ser uma string.',
            'state.max' => 'O estado não pode ter mais de 60 caracteres.',
            'file_pdf.required' => 'O Arquivo PDF é obrigatório',
            'file_pdf.mimes' => 'O Arquivo precisa ser um PDF',
            'file_pdf.max' => 'O tamanho máximo do arquivo é 10MB'
        ];
    }
}
