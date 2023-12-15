<?php

namespace App\Http\Requests\admin\Sectors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SectorsCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required|boolean',
            'email_sector' => 'required|string|max:191|unique:sectors,email_sector',
            'available' => 'required|boolean'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome deve ser uma string',
            'name.max' => 'O nome deve ter no máximo 191 caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.string' => 'A descrição deve ser uma string',
            'avatar.required' => 'A imagem do setor é obrigatória',
            'avatar.image' => 'O arquivo deve ser uma imagem',
            'avatar.mimes' => 'O avatar deve ser uma imagem do tipo: jpeg, png, jpg, gif, svg,webp',
            'avatar.max' => 'O tamanho máximo do avatar é 2MB',
            'status.required' => 'O status é obrigatório',
            'status.boolean' => 'O status deve ser um booleano',
            'email_sector.required' => 'O email do setor é obrigatório',
            'email_sector.string' => 'O email do setor deve ser uma string',
            'email_sector.max' => 'O email do setor deve ter no máximo 191 caracteres',
            'email_sector.unique' => 'O email do setor já está em uso',
            'available.required' => 'O status de disponibilidade é obrigatório',
            'available.boolean' => 'O status de disponibilidade deve ser um booleano'
        ];
    }
}
