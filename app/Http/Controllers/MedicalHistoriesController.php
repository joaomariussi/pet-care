<?php

namespace App\Http\Controllers;

use App\DataTables\MedicalHistoriesDataTable;
use App\Http\Requests\MedicalHistories\MedicalHistoriesRequest;
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
     * Carrega a DataTable de Histórico Médico
     * @throws Exception
     */
    public function index(MedicalHistoriesDataTable $datatable): mixed
    {
        try {
            $totalMedicalHistory = MedicalHistories::count();
            return $datatable->render('admin.pages.medical-histories.view-index', compact('totalMedicalHistory'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     *  View para criar os históricos médicos
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateMedicalHistory(): View|Factory|RedirectResponse|Application
    {
        try {
            $pets = Pets::all();
            $veterinarians = Veterinarians::all();
            return view('admin.pages.medical-histories.view-create', compact('pets', 'veterinarians'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de históricos médicos!');
        }

        return redirect()->route('medical-histories');
    }

    /**
     * Cria um novo histórico médico
     * @param MedicalHistoriesRequest $request
     * @return RedirectResponse
     */
    public function create(MedicalHistoriesRequest $request): RedirectResponse
    {
        try {
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
     * View para atualizar os históricos médicos
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateMedicalHistory($id): View|Factory|RedirectResponse|Application
    {
        try {
            $medicalHistory = $this->medicalHistory::query()->find($id);
            $pets = Pets::all();
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
            $data = $request->validated();
            $medicalHistory = $this->medicalHistory::query()->findOrFail($id);
            $medicalHistory->update($data);
            UserNotification::success('Histórico médico atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar o histórico médico!');
        }

        return redirect()->route('medical-histories');
    }

    public function delete($id): RedirectResponse
    {
        try {
            $medicalHistory = $this->medicalHistory::query()->findOrFail($id);
            $medicalHistory->delete();
            UserNotification::success('Histórico médico deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o histórico médico!');
        }

        return redirect()->route('medical-histories');
    }
}
