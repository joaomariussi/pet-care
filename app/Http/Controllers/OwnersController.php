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
     *  View para criar os proprietários
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
     * @throws Exception
     */
    public function create(OwnersCreateRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Removendo as máscaras
            $data['cpf'] = removeMask($data['cpf']);
            $data['telefone'] = removeMask($data['telefone']);
            $data['celular'] = removeMask($data['celular']);
            $data['cep'] = removeMask($data['cep']);

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
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function viewUpdateOwner($id): View|Factory|RedirectResponse|Application
    {
        try {
            $owner = $this->owners::query()->find($id);
            return view('admin.pages.owners.view-update', compact('owner'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar o proprietário!');
        }

        return redirect()->route('owners');
    }

    /**
     * @param OwnersUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(OwnersUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Removendo as máscaras
            $data['cpf'] = removeMask($data['cpf']);
            $data['telefone'] = removeMask($data['telefone']);
            $data['celular'] = removeMask($data['celular']);
            $data['cep'] = removeMask($data['cep']);

            $this->owners::query()->find($id)->update($data);
            UserNotification::success('Proprietário atualizado com sucesso!');

            return redirect()->route('owners');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o proprietário!');
        }

        return redirect()->route('owners');
    }

}
