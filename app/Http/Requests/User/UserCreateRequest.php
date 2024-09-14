<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserCreateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'password' => [
                'required',
                'string',
                'min:8'     // must be at least 8 characters in length
            ],
            'type' => 'required'
        ];
    }

    /**
     *  Get the validation messages
     *
     * @return array<string, string>
     */
    public function messages():array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O e-mail é obrigatório',
            'email.email' => 'E-mail inválido',
            'email.unique' => 'Este e-mail já está em uso',
            'avatar.image' => 'O arquivo deve ser uma imagem',
            'avatar.mimes' => 'O arquivo deve ser uma imagem do tipo: jpeg, png, jpg, gif, svg,webp',
            'avatar.max' => 'O tamanho máximo do arquivo é 2MB',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres',
            'type.required' => 'O tipo de usuário é obrigatório'
        ];
    }
}
