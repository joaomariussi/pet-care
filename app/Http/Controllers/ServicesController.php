<?php

namespace App\Http\Controllers;

use App\DataTables\ServicesDataTable;
use App\Http\Requests\Services\ServicesRequest;
use App\Http\Requests\Services\ServicesUpdateRequest;
use App\Models\Categories;
use App\Models\Services;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class ServicesController extends Controller
{
    public function __construct(Services $services)
    {
        config(['view.active_sidebar' => 'services/']);
        $this->services = $services;
    }

    /**
     * Carrega a datatable de serviços
     * @throws Exception
     */
    public function index(ServicesDataTable $dataTable) : mixed
    {
        try {
            $totalServices = Services::count();
            return $dataTable->render('admin.pages.services.view-index', compact('totalServices'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * View para criar os serviços
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateServices(): View|Factory|RedirectResponse|Application
    {
        try {
            $categories = Categories::all();
            return view('admin.pages.services.view-create', compact('categories'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de serviços!');
        }

        return redirect()->route('services');
    }

    /**
     * Cria um novo serviço
     * @throws Exception
     */

    public function create(ServicesRequest $request): RedirectResponse
    {
        try {
            // Valida os dados
            $data = $request->validated();

            // Remove a máscara do campo price
            $data['price'] = str_replace(['R$', '.', ','], ['', '', '.'], $data['price']);

            // Cria o serviço
            $this->services::query()->create($data);
            UserNotification::success('Serviço criado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar o serviço!');
        }

        return redirect()->route('services');
    }

    /**
     * View para atualizar o serviço
     * @throws Exception
     */

    public function viewUpdateServices($id): View|Factory|RedirectResponse|Application
    {
        try {
            $service = $this->services::query()->findOrFail($id);
            $categories = Categories::all();
            return view('admin.pages.services.view-update', compact('service', 'categories'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de serviços!');
        }

        return redirect()->route('services');
    }

    public function update(ServicesUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $service = $this->services::query()->findOrFail($id);

            // Valida os dados
            $data = $request->validated();

            // Remove a máscara do campo price
            $data['price'] = str_replace(['R$', '.', ','], ['', '', '.'], $data['price']);

            // Atualiza o serviço
            $service->update($data);
            UserNotification::success('Serviço atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o serviço!');
        }

        return redirect()->route('services');
    }

    /**
     * Deleta um serviço
     * @throws Exception
     */
    public function delete($id): RedirectResponse
    {
        try {
            $service = $this->services::query()->findOrFail($id);
            $service->delete();
            UserNotification::success('Serviço deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o serviço!');
        }

        return redirect()->route('services');
    }
}
