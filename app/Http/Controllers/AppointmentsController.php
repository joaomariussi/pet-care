<?php

namespace App\Http\Controllers;

use App\DataTables\AppointmentsDataTable;
use App\Http\Requests\Appointments\AppointmentsCreateRequest;
use App\Http\Requests\Appointments\AppointmentsUpdateRequest;
use App\Models\Appointments;
use App\Models\Employees;
use App\Models\Owners;
use App\Models\Pets;
use App\Models\Services;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class AppointmentsController extends Controller
{
    public function __construct(Appointments $appointment)
    {
        config(['view.active_sidebar' => 'appointments/']);
        $this->appointment = $appointment;
    }

    /**
     * Carrega a DataTable de Agendamentos
     * @throws Exception
     */
    public function index(AppointmentsDataTable $datatable): mixed
    {
        try {
            $totalAppointments = Appointments::count();
            return $datatable->render('admin.pages.appointments.view-index', compact('totalAppointments'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     *  View para criar os agendamentos
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateAppointments(): View|Factory|RedirectResponse|Application
    {
        try {
            $pets = Pets::all();
            $owners = Owners::all();
            $services = Services::all();
            $employees = Employees::all();
            return view('admin.pages.appointments.view-create',
                compact('pets', 'owners', 'services', 'employees'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de agendamentos!');
        }
        return redirect()->route('appointments');
    }

    /**
     * Cria um novo agendamento
     * @param AppointmentsCreateRequest $request
     * @return RedirectResponse
     */
    public function create(AppointmentsCreateRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $serviceId = $data['service_id'];
            $scheduleDate = $data['schedule_date'];
            $scheduleTime = $data['schedule_time'];

            // Busca o serviço para obter o número de slots simultâneos
            $service = Services::findOrFail($serviceId);
            $simultaneousServices = $service->simultaneous_services;

            // Verifica quantos agendamentos já existem para o serviço nesse horário
            $existingAppointmentsCount = Appointments::where('service_id', $serviceId)
                ->where('schedule_date', $scheduleDate)
                ->where('schedule_time', $scheduleTime)
                ->count();


            // Se o número de agendamentos existentes for maior ou igual aos slots simultâneos, retorna erro
            if ($existingAppointmentsCount >= $simultaneousServices) {
                UserNotification::error('Já existem agendamentos suficientes para esse serviço nesse horário.');
                return redirect()->back()->withInput();
            }

            // Define o status como "Em Andamento"
            $data['status'] = 'Em Andamento';

            $this->appointment::query()->create($data);
            UserNotification::success('Agendamento criado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar o agendamento!');
        }

        return redirect()->route('appointments');
    }

    /**
     * Função para buscar os horários indisponíveis
     * @param AppointmentsCreateRequest $request
     * @return JsonResponse
     */
    public function getUnavailableTimes(AppointmentsCreateRequest $request): JsonResponse
    {
        $scheduleDate = $request->input('schedule_date');
        $serviceId = $request->input('service_id');

        // Busca o serviço e obtém a quantidade de slots simultâneos permitidos
        $service = Services::findOrFail($serviceId);
        $simultaneousServices = $service->simultaneous_services;

        // Busca os horários de agendamentos para a data e serviço selecionados, agrupando e contando quantos existem
        $unavailableTimes = Appointments::where('schedule_date', $scheduleDate)
            ->where('service_id', $serviceId)
            ->select('schedule_time')
            ->groupBy('schedule_time')
            ->havingRaw('COUNT(*) >= ?', [$simultaneousServices])
            ->pluck('schedule_time')
            ->toArray();

        return response()->json($unavailableTimes);
    }

    /**
     * View de atualização de agendamentos
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateAppointments($id): View|Factory|RedirectResponse|Application
    {
        try {
            $appointment = Appointments::findOrFail($id);
            $pets = Pets::all();
            $owners = Owners::all();
            $services = Services::all();
            $employees = Employees::all();
            return view('admin.pages.appointments.view-update',
                compact('appointment', 'pets', 'owners', 'services', 'employees'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de agendamentos!');
        }
        return redirect()->route('appointments');
    }

    /**
     * Atualiza um agendamento
     * @param AppointmentsUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(AppointmentsUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $data = $request->validated();

            $appointment = Appointments::findOrFail($id);

            // Permite a edição completa apenas se o status for "Em Andamento"
            if ($appointment->status == 'Em Andamento') {
                $appointment->update($data);
            } else {
                // Se o status for "Confirmado" ou posterior, apenas o status pode ser atualizado
                $appointment->status = $request->input('status');
                $appointment->save(); // Só precisa salvar aqui após atualizar o status
            }

            UserNotification::success('Agendamento atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o agendamento!');
        }

        return redirect()->route('appointments.view-details', $id);
    }

    /**
     * View de detalhes do agendamento
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewDetailsAppointments($id): View|Factory|RedirectResponse|Application
    {
        try {
            $appointment = Appointments::findOrFail($id);
            return view('admin.pages.appointments.view-details', compact('appointment'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de detalhes do agendamento!');
        }
        return redirect()->route('appointments');
    }

    /**
     * Atualiza o status do agendamento
     * @param AppointmentsUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateStatus(AppointmentsUpdateRequest $request, $id): RedirectResponse
    {
        try {
            // Resgata os dados
            $data = $request->validated();

            // Busca o agendamento
            $appointment = Appointments::findOrFail($id);

            // Atualiza o status
            $appointment->status = $data['status'];
            $appointment->save();
            UserNotification::success('Status do agendamento atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o status do agendamento!');
        }

        return redirect()->route('appointments.view-details', $id);
    }

    /**
     * Deleta um agendamento
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            $appointment = $this->appointment::query()->findOrFail($id);
            $appointment->delete();
            UserNotification::success('Agendamento deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o agendamento!');
        }

        return redirect()->route('appointments');
    }
}