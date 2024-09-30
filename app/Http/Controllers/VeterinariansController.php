<?php

namespace App\Http\Controllers;

use App\DataTables\VeterinariansDataTable;
use App\Http\Requests\Veterinarians\VeterinariansRequest;
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
     * Carrega a DataTable de Veterinarians
     * @throws Exception
     */
    public function index(VeterinariansDataTable $datatable): mixed
    {
        try {
            $totalVeterinarians = Veterinarians::count();
            return $datatable->render('admin.pages.veterinarians.view-index', compact('totalVeterinarians'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     *  View para criar os veterinarians
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
     * Cria um novo veterinário
     * @throws Exception
     */
    public function create(VeterinariansRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Remove as máscaras dos campos
            $data['cpf'] = removeMask($data['cpf']);
            $data['cell_phone'] = removeMask($data['cell_phone']);
            $data['crm'] = removeMask($data['crm'], 'alphanumeric');

            $this->veterinarians::query()->create($data);
            UserNotification::success('Veterinário cadastrado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o veterinário!');
        }

        return redirect()->route('veterinarians');
    }

    /**
     * Viw para atualizar o veterinário
     * @throws Exception
     */
    public function viewUpdateVeterinarians(int $id): View|Factory|RedirectResponse|Application
    {
        try {
            $veterinarian = Veterinarians::find($id);
            return view('admin.pages.veterinarians.view-update', compact('veterinarian'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de veterinários!');
        }

        return redirect()->route('veterinarians');
    }

    /**
     * Atualiza o veterinário
     * @throws Exception
     */
    public function update(VeterinariansUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Remove as máscaras dos campos
            $data['cpf'] = removeMask($data['cpf']);
            $data['cell_phone'] = removeMask($data['cell_phone']);
            $data['crm'] = removeMask($data['crm'], 'alphanumeric');

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
     * Deleta o veterinário
     * @throws Exception
     */
    public function delete(int $id): RedirectResponse
    {
        try {
            $this->veterinarians::query()->findOrFail($id)->delete();
            UserNotification::success('Veterinário deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o veterinário!');
        }

        return redirect()->route('veterinarians');
    }
}
