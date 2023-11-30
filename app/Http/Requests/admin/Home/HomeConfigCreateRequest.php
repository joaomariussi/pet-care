<?php

namespace App\Http\Requests\admin\Home;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HomeConfigCreateRequest extends FormRequest
{
    /*
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /*
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'home_title' => 'required|string|max:70',
            'home_subtitle' => 'required|string|max:50',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }

    /*
     *  Get the validation messages.
     *
     * @return array<string , mixed>
     */
    public function messages():array
    {
        return [
            'home_title.required' => 'O título é obrigatório',
            'home_title.max' => 'O título excede o tamanho máximo permitido',
            'home_subtitle.required' => 'O subtítulo é obrigatório',
            'home_subtitle.max' => 'O subtítulo excede o tamanho máximo permitido',
            'avatar.sometimes' => 'A imagem deve ser um arquivo de imagem',
            'avatar.image' => 'A imagem deve ser um arquivo de imagem',
            'avatar.mimes' => 'A imagem deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg, webp',
            'avatar.max' => 'A imagem excede o tamanho máximo permitido',
        ];
    }
}
