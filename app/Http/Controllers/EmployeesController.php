<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeesDataTable;
use App\Http\Requests\Employees\EmployeesRequest;
use App\Http\Requests\Employees\EmployeesUpdateRequest;
use App\Models\Employees;
use App\Models\Positions;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class EmployeesController extends Controller
{
    public function __construct(Employees $employees)
    {
        config(['view.active_sidebar' => 'employees/']);
        $this->employees = $employees;
    }

    /**
     * @throws Exception
     */
    public function index(EmployeesDataTable $datatable): mixed
    {
        try {
            $totalEmployees = Employees::count();
            return $datatable->render('admin.pages.employees.view-index', compact('totalEmployees'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     *  View para criar os funcionários
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateEmployees(): View|Factory|RedirectResponse|Application
    {
        try {
            $positions = Positions::all();
            return view('admin.pages.employees.view-create', compact('positions'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de funcionários!');
        }

        return redirect()->route('employees');
    }

    /**
     * Cria um novo funcionário
     * @throws Exception
     */
    public function create(EmployeesRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Remove as máscaras dos campos
            $data['cpf'] = removeMask($data['cpf']);
            $data['telephone'] = removeMask($data['telephone']);

            $this->employees::query()->create($data);
            UserNotification::success('Funcionário cadastrado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o funcionário!');
        }

        return redirect()->route('employees');
    }

    /**
     * View para atualizar o funcionário
     * @throws Exception
     */

    public function viewUpdateEmployees($id): View|Factory|RedirectResponse|Application
    {
        try {
            $employee = $this->employees::query()->findOrFail($id);
            $positions = Positions::all();
            return view('admin.pages.employees.view-update', compact('employee', 'positions'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de funcionários!');
        }

        return redirect()->route('employees');
    }

    /**
     * Atualiza os dados do funcionário
     * @throws Exception
     */
    public function update(EmployeesUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $employee = $this->employees::query()->findOrFail($id);

            $data = $request->validated();

            // Remove as máscaras dos campos
            $data['cpf'] = removeMask($data['cpf']);
            $data['telephone'] = removeMask($data['telephone']);

            // Atualiza os dados do funcionário
            $employee->update($data);

            UserNotification::success('Funcionário atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o funcionário!');
        }

        return redirect()->route('employees');
    }

    /**
     * Deleta um funcionário
     * @throws Exception
     */
    public function delete($id): RedirectResponse
    {
        try {
            $employee = $this->employees::query()->findOrFail($id);
            $employee->delete();
            UserNotification::success('Funcionário deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o funcionário!');
        }

        return redirect()->route('employees');
    }
}
