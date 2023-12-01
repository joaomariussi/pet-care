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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'fileUpload' => 'sometimes|file|mimes:pdf|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.max' => 'O nome excede o tamanho máximo permitido',
            'status.required' => 'O status é obrigatório',
            'status.boolean' => 'O status deve ser um valor booleano',
            'avatar.image' => 'O avatar deve ser uma imagem',
            'avatar.mimes' => 'O avatar deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg, webp',
            'avatar.max' => 'O avatar excede o tamanho máximo permitido',
            'fileUpload.sometimes' => 'O arquivo é obrigatório',
            'fileUpload.file' => 'O arquivo deve ser um arquivo',
            'fileUpload.mimes' => 'O arquivo deve ser um arquivo do tipo: pdf',
            'fileUpload.max' => 'O arquivo excede o tamanho máximo permitido',
        ];
    }

}
