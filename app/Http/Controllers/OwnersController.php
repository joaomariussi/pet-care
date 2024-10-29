<?php

namespace App\Http\Controllers;

use App\DataTables\OwnersDataTable;
use App\Http\Requests\Owners\OwnersCreateRequest;
use App\Http\Requests\Owners\OwnersUpdateRequest;
use App\Models\Owners;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class OwnersController extends Controller
{
    public function __construct(Owners $owners)
    {
        config(['view.active_sidebar' => 'owners/']);
        $this->owners = $owners;
    }

    /**
     * Carrega da DataTable de proprietários
     * @param OwnersDataTable $datatable
     * @return mixed
     * @throws Exception
     */
    public function index(OwnersDataTable $datatable): mixed
    {
        try {
            $totalOwners = Owners::count();
            return $datatable->render('admin.pages.owners.view-index', compact('totalOwners'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * View de cadastro de proprietários
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateOwners(): View|Factory|RedirectResponse|Application
    {
        try {
            return view('admin.pages.owners.view-create');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de proprietários!');
        }

        return redirect()->route('owners');
    }

    /**
     * Cadastra um novo proprietário
     * @param OwnersCreateRequest $request
     * @return RedirectResponse
     */
    public function create(OwnersCreateRequest $request): RedirectResponse
    {
        try {
            // Valida os dados
            $data = $request->validated();

            // Cria o proprietário
            $this->owners::query()->create($data);
            UserNotification::success('Proprietário cadastrado com sucesso!');

            return redirect()->route('owners');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o proprietário!');
        }

        return redirect()->route('owners');
    }

    /**
     * View de atualização de proprietários
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateOwner($id): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca o proprietário
            $owner = Owners::find($id);
            return view('admin.pages.owners.view-update', compact('owner'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar o proprietário!');
        }

        return redirect()->route('owners');
    }

    /**
     * Atualiza um proprietário
     * @param OwnersUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(OwnersUpdateRequest $request, $id): RedirectResponse
    {
        try {
            // Valida os dados
            $data = $request->validated();

            // Busca o proprietário e atualiza os dados
            $this->owners::query()->find($id)->update($data);
            UserNotification::success('Proprietário atualizado com sucesso!');

            return redirect()->route('owners');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o proprietário!');
        }

        return redirect()->route('owners');
    }

    /**
     * Exclui um proprietário
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            // Busca o proprietário e exclui
            $owner = $this->owners::query()->find($id);

            // Se o proprietário tiver vinculo com o agendamento, não é possível excluir
            if ($owner->appointments()->count() > 0) {
                UserNotification::error(
                    'Não é possível deletar um proprietário que possui agendamentos vinculados!'
                );

                return redirect()->route('owners');
            }

            // Deleta o proprietário
            $owner->delete();
            UserNotification::success('Proprietário excluído com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao excluir o proprietário!');
        }

        return redirect()->route('owners');
    }

    /**
     * View para visualizar os detalhes de um proprietário
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewDetailsOwner($id): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca o proprietário
            $owner = $this->owners::query()->find($id);
            return view('admin.pages.owners.view-details', compact('owner'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar o proprietário!');
        }

        return redirect()->route('owners');
    }
}
