<?php

namespace App\Http\Controllers;

use App\DataTables\MedicalHistoriesDataTable;
use App\Http\Requests\MedicalHistories\MedicalHistoriesCreateRequest;
use App\Http\Requests\MedicalHistories\MedicalHistoriesUpdateRequest;
use App\Models\MedicalHistories;
use App\Models\Pets;
use App\Models\Veterinarians;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class MedicalHistoriesController extends Controller
{
    public function __construct(MedicalHistories $medicalHistory)
    {
        config(['view.active_sidebar' => 'medical-histories/']);
        $this->medicalHistory = $medicalHistory;
    }

    /**
     * Carrega a DataTable de históricos médicos
     * @param MedicalHistoriesDataTable $datatable
     * @return mixed
     * @throws Exception
     */
    public function index(MedicalHistoriesDataTable $datatable): mixed
    {
        try {
            // Conta o total de históricos médicos
            $totalMedicalHistory = MedicalHistories::count();
            return $datatable->render('admin.pages.medical-histories.view-index',
                compact('totalMedicalHistory'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * View para criar um novo histórico médico
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateMedicalHistory(): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca todos os pets
            $pets = Pets::all();

            // Busca todos os veterinários
            $veterinarians = Veterinarians::all();
            return view('admin.pages.medical-histories.view-create',
                compact('pets', 'veterinarians'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de históricos médicos!');
        }

        return redirect()->route('medical-histories');
    }

    /**
     * Cria um novo histórico médico
     * @param MedicalHistoriesCreateRequest $request
     * @return RedirectResponse
     */
    public function create(MedicalHistoriesCreateRequest $request): RedirectResponse
    {
        try {
            // Valida os dados
            $data = $request->validated();

            // Salva o histórico médico
            $medicalHistory = $this->medicalHistory::query()->create($data);

            // Atualiza o pet com o ID do histórico médico recém-criado
            $pet = Pets::find($medicalHistory->pet_id);
            if ($pet) {
                $pet->medical_history_id = $medicalHistory->id;
                $pet->save();
            }
            UserNotification::success('Histórico médico cadastrado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar o histórico médico!');
        }

        return redirect()->route('medical-histories');
    }

    /**
     * View para atualizar um histórico médico
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateMedicalHistory($id): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca o histórico médico
            $medicalHistory = $this->medicalHistory::query()->find($id);

            // Busca todos os pets
            $pets = Pets::all();

            // Busca todos os veterinários
            $veterinarians = Veterinarians::all();
            return view('admin.pages.medical-histories.view-update',
                compact('medicalHistory', 'pets', 'veterinarians'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de históricos médicos!');
        }

        return redirect()->route('medical-histories');
    }

    /**
     * Atualiza o histórico médico
     * @param MedicalHistoriesUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(MedicalHistoriesUpdateRequest $request, $id): RedirectResponse
    {
        try {
            // Valida os dados
            $data = $request->validated();

            // Busca o histórico médico
            $medicalHistory = $this->medicalHistory::query()->findOrFail($id);

            // Atualiza o histórico médico
            $medicalHistory->update($data);
            UserNotification::success('Histórico médico atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o histórico médico!');
        }

        return redirect()->route('medical-histories');
    }

    /**
     * Deleta um histórico médico
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            // Busca o histórico médico e deleta
            $this->medicalHistory::query()->findOrFail($id);
            UserNotification::success('Histórico médico deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o histórico médico!');
        }

        return redirect()->route('medical-histories');
    }
}
