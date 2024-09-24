<?php

namespace App\Http\Requests\Positions;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PositionsRequest extends FormRequest
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
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'salary' => 'required',
            'experience_with_animals' => 'required',
            'additional_skills' => 'required',
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
            'name.required' => 'O nome é obrigatório',
            'description.required' => 'A descrição é obrigatória',
            'salary.required' => 'O salário é obrigatório',
            'experience_with_animals.required' => 'A experiência com animais é obrigatória',
            'additional_skills.required' => 'As habilidades adicionais são obrigatórias',
        ];
    }
}
