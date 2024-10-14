<?php

namespace App\Http\Controllers;

use App\DataTables\VeterinariansDataTable;
use App\Http\Requests\Veterinarians\VeterinariansCreateRequest;
use App\Http\Requests\Veterinarians\VeterinariansUpdateRequest;
use App\Models\Veterinarians;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class VeterinariansController extends Controller
{
    public function __construct(Veterinarians $veterinarians)
    {
        config(['view.active_sidebar' => 'veterinarians/']);
        $this->veterinarians = $veterinarians;
    }

    /**
     * Carrega a DataTable de Veterinários
     * @throws Exception
     */
    public function index(VeterinariansDataTable $datatable): mixed
    {
        try {
            $totalVeterinarians = Veterinarians::count();
            return $datatable->render('admin.pages.veterinarians.view-index',
                compact('totalVeterinarians'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     *  View para criar os Veterinários
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateVeterinarians(): View|Factory|RedirectResponse|Application
    {
        try {
            return view('admin.pages.veterinarians.view-create');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de veterinarians!');
        }

        return redirect()->route('veterinarians');
    }

    /**
     * Cria o Veterinário
     * @param VeterinariansCreateRequest $request
     * @return RedirectResponse
     */
    public function create(VeterinariansCreateRequest $request): RedirectResponse
    {
        try {
            // Valida os campos
            $data = $request->validated();

            // Cria o veterinário
            $this->veterinarians::query()->create($data);
            UserNotification::success('Veterinário cadastrado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o veterinário!');
        }

        return redirect()->route('veterinarians');
    }

    /**
     * View para atualizar os Veterinários
     * @param int $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateVeterinarians(int $id): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca o veterinário
            $veterinarian = Veterinarians::find($id);
            return view('admin.pages.veterinarians.view-update', compact('veterinarian'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de veterinários!');
        }

        return redirect()->route('veterinarians');
    }

    /**
     * Atualiza o Veterinário
     * @param VeterinariansUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(VeterinariansUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            // Valida os campos
            $data = $request->validated();

            // Atualiza o veterinário
            $this->veterinarians::query()->findOrFail($id)->update($data);
            UserNotification::success('Veterinário atualizado com sucesso!');

            return redirect()->route('veterinarians');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o veterinário!');
        }

        return redirect()->route('veterinarians');
    }

    /**
     * Deleta o Veterinário
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        try {
            // Busca o veterinário e deleta
            $this->veterinarians::query()->findOrFail($id)->delete();
            UserNotification::success('Veterinário deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o veterinário!');
        }

        return redirect()->route('veterinarians');
    }
}
