<?php

namespace App\Http\Controllers;

use App\DataTables\DashboardDataTable;
use App\Models\Appointments;
use App\Models\Employees;
use App\Models\Owners;
use App\Models\Pets;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        config(['view.active_sidebar' => 'admin/']);
    }

    /**
     * @param DashboardDataTable $dataTable
     * @return View|Factory|Application|RedirectResponse|null
     */
    public function index(DashboardDataTable $dataTable ): mixed
    {
        try {
            // Busca dos dados para a dashboard com eager loading
            $totalAppointments = Appointments::count();
            $totalEmployees = Employees::count();
            $totalPets = Pets::count();
            $totalOwners = Owners::count();

            // Contagem de agendamentos por status
            $appointmentsInProgress = Appointments::where('status', 'Em andamento')->count();
            $appointmentsConfirmed = Appointments::where('status', 'Confirmado')->count();
            $appointmentsCanceled = Appointments::where('status', 'Cancelado')->count();
            $appointmentsCompleted = Appointments::where('status', 'Concluído')->count();

            // Dados adicionais
            $newEmployeesThisMonth = Employees::whereMonth('created_at', now()->month)->count();
            $newPetsThisMonth = Pets::whereMonth('created_at', now()->month)->count();
            $newOwnersThisMonth = Owners::whereMonth('created_at', now()->month)->count();

            return $dataTable->render('admin.pages.dashboard.view-index', compact(
                'totalAppointments',
                'totalEmployees',
                'totalPets',
                'totalOwners',
                'appointmentsInProgress',
                'appointmentsConfirmed',
                'appointmentsCanceled',
                'appointmentsCompleted',
                'newEmployeesThisMonth',
                'newPetsThisMonth',
                'newOwnersThisMonth'
            ));
        } catch (Throwable $t) {
            return applicationError($t);
        }
    }
}
