<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserAvatarUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.required' => 'O avatar é obrigatório',
            'avatar.image' => 'O avatar deve ser uma imagem',
            'avatar.mimes' => 'O avatar deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg, webp',
            'avatar.max' => 'O avatar deve ter no máximo 2048 KB',
        ];
    }
}
