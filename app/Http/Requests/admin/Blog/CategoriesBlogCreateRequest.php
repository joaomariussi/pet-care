<?php

namespace App\Http\Requests\admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoriesBlogCreateRequest extends FormRequest
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
            'name_category' => 'required|string|max:100|unique:categories_blog,name_category',
            'status' => 'required|boolean'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name_category.required' => 'O nome é obrigatório',
            'name_category.string' => 'O nome deve ser uma string',
            'name_category.max' => 'O nome deve ter no máximo 100 caracteres',
            'name_category.unique' => 'O nome já está cadastrado',
            'status.required' => 'O status é obrigatório',
            'status.boolean' => 'O status deve ser um booleano'
        ];
    }
}
