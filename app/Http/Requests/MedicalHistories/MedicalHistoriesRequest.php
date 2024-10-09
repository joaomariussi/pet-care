<?php

namespace App\Http\Requests\MedicalHistories;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MedicalHistoriesRequest extends FormRequest
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
            'pet_id' => 'required|exists:pets,id',
            'veterinarian_id' => 'required|exists:veterinarians,id',
            'diagnosis' => 'required|max:255',
            'treatment' => 'required|max:255',
            'date' => 'required|date',
            'observations' => 'max:255',
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
            'pet_id.required' => 'O campo pet é obrigatório.',
            'pet_id.exists' => 'O campo pet deve ser um ID válido.',
            'veterinarian_id.required' => 'O campo veterinário é obrigatório.',
            'veterinarian_id.exists' => 'O campo veterinário deve ser um ID válido.',
            'diagnosis.required' => 'O campo diagnóstico é obrigatório.',
            'diagnosis.max' => 'O campo diagnóstico deve ter no máximo 255 caracteres.',
            'treatment.required' => 'O campo tratamento é obrigatório.',
            'treatment.max' => 'O campo tratamento deve ter no máximo 255 caracteres.',
            'date.required' => 'O campo data é obrigatório.',
            'date.date' => 'O campo data deve ser uma data válida.',
            'observations.max' => 'O campo observação deve ter no máximo 255 caracteres.',
        ];
    }
}
