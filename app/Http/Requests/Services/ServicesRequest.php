<?php

namespace App\Http\Requests\Services;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ServicesRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'simultaneous_services' => 'required|integer|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'category_id.required' => 'Categoria é obrigatória',
            'category_id.exists' => 'Categoria não encontrada',
            'name.required' => 'Nome é obrigatório',
            'name.max' => 'Nome deve ter no máximo 255 caracteres',
            'description.required' => 'Descrição é obrigatória',
            'price.required' => 'Preço é obrigatório',
            'duration.required' => 'Duração é obrigatória',
            'simultaneous_services.required' => 'Serviços simultâneos é obrigatório',
            'simultaneous_services.integer' => 'Serviços simultâneos deve ser um número inteiro',
            'simultaneous_services.numeric' => 'Serviços simultâneos deve ser um número',
        ];
    }
}
