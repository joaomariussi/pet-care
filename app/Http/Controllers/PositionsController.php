<?php

namespace App\Http\Controllers;

use App\DataTables\PositionsDataTable;
use App\Http\Requests\Positions\PositionsCreateRequest;
use App\Http\Requests\Positions\PositionsUpdateRequest;
use App\Models\Positions;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class PositionsController extends Controller
{
    public function __construct(Positions $positions)
    {
        config(['view.active_sidebar' => 'positions/']);
        $this->positions = $positions;
    }

    /**
     * Carrega da DataTable de Cargos
     * @param PositionsDataTable $datatable
     * @return mixed
     * @throws Exception
     */
    public function index(PositionsDataTable $datatable): mixed
    {
        try {
            $totalPositions = Positions::count();
            return $datatable->render('admin.pages.positions.view-index', compact('totalPositions'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * Carrega a View de criação de um cargo.
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreatePositions(): View|Factory|RedirectResponse|Application
    {
        try {
            return view('admin.pages.positions.view-create');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de cargos!');
        }

        return redirect()->route('positions');
    }

    /**
     * Cria o cargo.
     * @param PositionsCreateRequest $request
     * @return RedirectResponse
     */
    public function create(PositionsCreateRequest $request): RedirectResponse
    {

        try {
            // Valida os dados.
            $data = $request->validated();

            // Salva os dados no banco de dados
            $this->positions::query()->create($data);

            UserNotification::success('Cargo cadastrado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o cargo!');
        }

        return redirect()->route('positions');
    }

    /**
     * View para atualizar um cargo.
     * @param int $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdatePositions(int $id): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca o cargo
            $position = $this->positions::query()->find($id);
            return view('admin.pages.positions.view-update', compact('position'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de cargos!');
        }

        return redirect()->route('positions');
    }

    /**
     * Atualiza o cargo
     * @param PositionsUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PositionsUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            // Valida os dados
            $data = $request->validated();

            // Atualiza os dados no banco de dados
            $this->positions::query()->find($id)->update($data);

            UserNotification::success('Cargo atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o cargo!');
        }

        return redirect()->route('positions');
    }

    /**
     * Deleta um cargo
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        try {
            // Busca pelo cargo
            $position = $this->positions::query()->find($id);

            // Se o cargo possuir funcionários vinculados, não é possível deletar
            if ($position->employees->count() > 0) {
                UserNotification::error('Não é possível deletar um cargo que possui funcionários vinculados!');
                return redirect()->route('positions');
            }

            // Deleta o cargo
            $position->delete();
            UserNotification::success('Cargo deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o cargo!');
        }

        return redirect()->route('positions');
    }
}
