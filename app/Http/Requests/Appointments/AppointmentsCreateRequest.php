<?php

namespace App\Http\Requests\Appointments;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AppointmentsCreateRequest extends FormRequest
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
        // Se for uma verificação de horários (definindo pela rota)
        if ($this->isCheckingAvailableTimes()) {
            return [
                'schedule_date' => 'required|date',
            ];
        }

        return [
            'pet_id' => 'required|exists:pets,id',
            'service_id' => 'required|exists:services,id',
            'employee_id' => 'required|exists:employees,id',
            'schedule_date' => 'required|date',
            'schedule_time' => ['required', 'date_format:H:i', 'after_or_equal:08:00', 'before_or_equal:18:00'],
            'observations' => 'nullable|string',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'pet_id.required' => 'O campo Pet é obrigatório.',
            'pet_id.exists' => 'O Pet informado não existe.',
            'service_id.required' => 'O campo Serviço é obrigatório.',
            'service_id.exists' => 'O Serviço informado não existe.',
            'employee_id.required' => 'O campo Veterinário é obrigatório.',
            'employee_id.exists' => 'O Veterinário informado não existe.',
            'schedule_date.required' => 'O campo data do agendamento é obrigatório.',
            'schedule_date.date' => 'O campo data do agendamento deve ser uma data válida.',
            'schedule_time.required' => 'O campo horário é obrigatório.',
            'schedule_time.' => 'O campo horário deve ser uma hora válida.',
            'schedule_time.after_or_equal' => 'O horário deve ser após as 08:00.',
            'schedule_time.before_or_equal' => 'O horário deve ser antes das 18:00.',
            'observations.string' => 'O campo Observações deve ser uma string.',
        ];
    }

    /**
     * Verifica se a requisição é para a verificação de horários disponíveis.
     */
    protected function isCheckingAvailableTimes(): bool
    {
        return $this->routeIs('appointments.unavailable-times');
    }
}
