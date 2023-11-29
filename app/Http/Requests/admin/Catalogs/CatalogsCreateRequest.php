<?php

namespace App\Http\Requests\admin\Catalogs;

use Illuminate\Foundation\Http\FormRequest;

class CatalogsCreateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'fileUpload' => 'required',
            'avatar' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome deve ser uma string',
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'status.required' => 'O status é obrigatório',
            'status.boolean' => 'O status deve ser um booleano',
            'fileUpload.required' => 'O arquivo é obrigatório',
            'avatar.required' => 'O avatar é obrigatório',
        ];
    }

}
