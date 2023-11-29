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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required|boolean'
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
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.string' => 'A descrição deve ser uma string',
            'avatar.image' => 'O arquivo deve ser uma imagem',
            'avatar.mimes' => 'O avatar deve ser uma imagem do tipo: jpeg, png, jpg, gif, svg,webp',
            'avatar.max' => 'O tamanho máximo do avatar é 2MB',
            'status.required' => 'O status é obrigatório',
            'status.boolean' => 'O status deve ser um booleano'
        ];
    }
}
