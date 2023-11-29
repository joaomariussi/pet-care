<?php

namespace App\Http\Requests\admin\Jobs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class JobsUpdateRequest extends FormRequest
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
            'sector_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'sector_id.required' => 'O setor é obrigatório',
            'sector_id.integer' => 'O setor deve ser um inteiro',
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome deve ser uma string',
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'description.required' => 'A descrição é obrigatória',
            'description.string' => 'A descrição deve ser uma string',
            'status.required' => 'O status é obrigatório',
            'status.boolean' => 'O status deve ser um booleano'
        ];
    }
}
