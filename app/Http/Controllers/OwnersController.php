<?php

namespace App\Http\Controllers;

use App\DataTables\OwnersDataTable;
use App\Http\Requests\Owners\OwnersCreateRequest;
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
     * @return Application|Factory|View
     * View para criar os proprietários
     */

    public function viewCreateOwners(): View|Factory|Application
    {
        $owners = Owners::all();
        return view('admin.pages.owners.view-create', compact('owners'));
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

            $this->owners->create($data);
            UserNotification::success('Proprietário cadastrado com sucesso!');

            return redirect()->route('owners');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o proprietário!');
        }

        return redirect()->back();
    }


}
