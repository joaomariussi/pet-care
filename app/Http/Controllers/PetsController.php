<?php

namespace App\Http\Controllers;

use App\DataTables\PetsDataTable;
use App\Http\Requests\Pets\PetsCreateRequest;
use App\Http\Requests\Pets\PetsUpdateRequest;
use App\Models\MedicalHistories;
use App\Models\Owners;
use App\Models\Pets;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class PetsController extends Controller
{
    public function __construct(Pets $pets)
    {
        config(['view.active_sidebar' => 'pets/']);
        $this->pets = $pets;
    }

    /**
     * Carrega a DataTable de Pets
     * @throws Exception
     */
    public function index(PetsDataTable $datatable): mixed
    {
        try {
            $totalPets = Pets::count();
            return $datatable->render('admin.pages.pets.view-index', compact('totalPets'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     *  View para criar os pets
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreatePets(): View|Factory|RedirectResponse|Application
    {
        try {
            $owners = Owners::all();
            $medicalHistories = MedicalHistories::all();
            return view('admin.pages.pets.view-create', compact('owners', 'medicalHistories'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de pets!');
        }

        return redirect()->route('pets');
    }

    /**
     * @param PetsCreateRequest $request
     * @return RedirectResponse
     */
    public function create(PetsCreateRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('photo')) {
                // Pega o arquivo de imagem
                $image = $request->file('photo');

                // Gera um nome único para a imagem
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Move a imagem para o diretório 'public/images/pets'
                $image->move(public_path('images/pets'), $imageName);

                // Salva o caminho da imagem no banco de dados
                $data['photo'] = 'images/pets/' . $imageName;
            }

            // Substitui a vírgula por ponto no peso
            $data['weight'] = str_replace(',', '.', $data['weight']);

            $this->pets::query()->create($data);
            UserNotification::success('Pet criado com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar Pet.');
        }

        return redirect()->route('pets');
    }

    /**
     * View para atualizar o pet
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdatePets($id):View|Factory|RedirectResponse|Application
    {
        try {
            $pet = $this->pets::query()->findOrFail($id);

            $owners = Owners::all();
            $medicalHistories = MedicalHistories::all();
            return view('admin.pages.pets.view-update', compact('pet', 'owners', 'medicalHistories'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de pets!');
        }

        return redirect()->route('pets');
    }

    /**
     * Atualiza o pet
     * @param PetsUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PetsUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $data = $request->validated();
            $pet = $this->pets::query()->findOrFail($id);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $data['avatar'] = $imageBase64;
            }

            // Substitui a vírgula por ponto no peso
            $data['weight'] = str_replace(',', '.', $data['weight']);

            $pet->update($data);
            UserNotification::success('Pet atualizado com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar Pet.');
        }

        return redirect()->route('pets');
    }

    /**
     * Deleta o pet
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            $pet = $this->pets::query()->findOrFail($id);
            $pet->delete();
            UserNotification::success('Pet deletado com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar Pet.');
        }

        return redirect()->route('pets');
    }

    /**
     * View para visualizar os detalhes do pet
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewDetailsPets($id): View|Factory|RedirectResponse|Application
    {
        try {
            $pet = $this->pets::query()->findOrFail($id);
            return view('admin.pages.pets.view-details', compact('pet'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de detalhes de pets!');
        }

        return redirect()->route('pets');
    }
}
