<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeesDataTable;
use App\Http\Requests\Employees\EmployeesCreateRequest;
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
     * Carrega a DataTable de funcionários.
     * @param EmployeesDataTable $datatable
     * @return mixed
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
     * View para cadastrar os funcionários.
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateEmployees(): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca todos os funcionários.
            $positions = Positions::all();
            return view('admin.pages.employees.view-create', compact('positions'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de funcionários!');
        }

        return redirect()->route('employees');
    }

    /**
     * Cria e salva o funcionário no banco de dados.
     * @param EmployeesCreateRequest $request
     * @return RedirectResponse
     */
    public function create(EmployeesCreateRequest $request): RedirectResponse
    {
        try {
            // Valida os dados do formulário
            $data = $request->validated();

            // Salva os dados
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
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateEmployees($id): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca o funcionário
            $employee = $this->employees::query()->findOrFail($id);

            // Busca todas as posições
            $positions = Positions::all();
            return view('admin.pages.employees.view-update', compact('employee', 'positions'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de funcionários!');
        }

        return redirect()->route('employees');
    }

    /**
     * Atualiza o funcionário
     * @param EmployeesUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(EmployeesUpdateRequest $request, $id): RedirectResponse
    {
        try {
            // Busca o funcionário pelo ID
            $employee = $this->employees::query()->findOrFail($id);

            // Valida os dados do formulário
            $data = $request->validated();

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
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            // Busca o funcionário pelo ID
            $employee = $this->employees::query()->findOrFail($id);

            // Se o funcionário estiver vinculado em um agendamento, não é possível excluir
            if ($employee->appointments()->count() > 0) {
                UserNotification::error(
                    'Não é possível deletar um funcionário que possui agendamentos vinculados!'
                );
                return redirect()->route('employees');
            }

            // Deleta o funcionário
            $employee->delete();
            UserNotification::success('Funcionário deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o funcionário!');
        }

        return redirect()->route('employees');
    }
}
