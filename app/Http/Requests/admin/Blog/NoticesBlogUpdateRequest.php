<?php

namespace App\Http\Requests\admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NoticesBlogUpdateRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'subtitle' => 'required|string|max:150',
            'content' => 'required|string',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required|boolean'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'A categoria é obrigatória',
            'category_id.integer' => 'A categoria deve ser um inteiro',
            'title.required' => 'O título é obrigatório',
            'title.string' => 'O título deve ser uma string',
            'title.max' => 'O título deve ter no máximo 100 caracteres',
            'subtitle.required' => 'O subtítulo é obrigatório',
            'subtitle.string' => 'O subtítulo deve ser uma string',
            'subtitle.max' => 'O subtítulo deve ter no máximo 150 caracteres',
            'content.required' => 'O conteúdo é obrigatório',
            'content.string' => 'O conteúdo deve ser uma string',
            'avatar.image' => 'O arquivo deve ser uma imagem',
            'avatar.mimes' => 'O avatar deve ser uma imagem do tipo: jpeg, png, jpg, gif, svg,webp',
            'avatar.max' => 'O tamanho máximo do avatar é 2MB',
            'status.required' => 'O status é obrigatório',
            'status.boolean' => 'O status deve ser um booleano'
        ];
    }
}
