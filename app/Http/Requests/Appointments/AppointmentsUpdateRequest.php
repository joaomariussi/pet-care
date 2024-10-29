<?php

namespace App\Http\Requests\Appointments;

use App\Models\Appointments;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AppointmentsUpdateRequest extends FormRequest
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
        $rules = [
            'status' => 'required|in:Em Andamento,Confirmado,Cancelado,Concluído',
        ];

        // Regras adicionais se o agendamento ainda estiver "Em Andamento"
        if ($this->route('id')) {
            $appointment = Appointments::find($this->route('id'));
            if ($appointment && $appointment->status === 'Em Andamento') {
                $rules += [
                    'pet_id' => 'required|exists:pets,id',
                    'service_id' => 'required|exists:services,id',
                    'employee_id' => 'required|exists:employees,id',
                    'schedule_date' => 'required|date',
                    'schedule_time' => 'required|date_format:H:i|after_or_equal:08:00|before_or_equal:18:00',
                ];
            }
        }

        return $rules;
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
            'employee_id.required' => 'O campo Funcionário é obrigatório.',
            'employee_id.exists' => 'O Funcionário informado não existe.',
            'schedule_date.required' => 'O campo Data do Agendamento é obrigatório.',
            'schedule_date.date' => 'O campo Data deve ser uma data válida.',
            'schedule_time.required' => 'O campo Horário é obrigatório.',
            'schedule_time.date_format' => 'O Horário deve estar no formato HH:mm.',
            'schedule_time.after_or_equal' => 'O Horário deve ser após as 08:00.',
            'schedule_time.before_or_equal' => 'O Horário deve ser antes das 18:00.',
            'status.required' => 'O campo Status é obrigatório.',
            'status.in' => 'O Status selecionado é inválido.',
            'observations.string' => 'O campo Observações deve ser uma string.',
        ];
    }
}
