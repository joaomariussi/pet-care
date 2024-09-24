<?php

namespace App\Http\Controllers;

use App\DataTables\PositionsDataTable;
use App\Http\Requests\Positions\PositionsRequest;
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

    public function create(PositionsRequest $request): RedirectResponse
    {

        try {
            $data = $request->validated();

            // Remove a máscara do salário: Remove "R$", "." e troca "," por "."
            $data['salary'] = str_replace(['R$', '.', ','], ['', '', '.'], $data['salary']);

            // Salva os dados no banco de dados
            $this->positions::query()->create($data);

            UserNotification::success('Cargo cadastrado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o cargo!');
        }

        return redirect()->route('positions');
    }

    public function viewUpdatePositions(int $id): View|Factory|RedirectResponse|Application
    {
        try {
            $position = $this->positions::query()->find($id);
            return view('admin.pages.positions.view-update', compact('position'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de cargos!');
        }

        return redirect()->route('positions');
    }

    public function update(PositionsUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Remove a máscara do salário: Remove "R$", "." e troca "," por "."
            $data['salary'] = str_replace(['R$', '.', ','], ['', '', '.'], $data['salary']);

            // Atualiza os dados no banco de dados
            $this->positions::query()->find($id)->update($data);

            UserNotification::success('Cargo atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o cargo!');
        }

        return redirect()->route('positions');
    }

    public function delete(int $id): RedirectResponse
    {
        try {
            $this->positions::query()->find($id)->delete();
            UserNotification::success('Cargo deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o cargo!');
        }

        return redirect()->route('positions');
    }
}
