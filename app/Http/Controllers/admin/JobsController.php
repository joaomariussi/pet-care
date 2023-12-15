<?php

namespace App\Http\Controllers\admin;

use App\DataTables\JobsDataTable;
use App\DataTables\ResumesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Jobs\JobsCreateRequest;
use App\Http\Requests\admin\Jobs\JobsUpdateRequest;
use App\Models\admin\Jobs;
use App\Models\admin\Sectors;
use App\Models\site\Resumes;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class JobsController extends Controller
{

    /*
     * @var Jobs
     */
    private Jobs $jobs;

    /**
     * JobsController constructor.
     */
    public function __construct(Jobs $jobs)
    {
        config(['view.active_sidebar' => 'jobs/']);
        $this->jobs = $jobs;

    }

    /**
     * @return mixed
     * View para visualizar as vagas cadastradas - Retorna a datatable e o contador de vagas
     * @throws Exception
     */
    public function index(JobsDataTable $datatable): mixed
    {
        try {
            $totalJobs = Jobs::count();
            return $datatable->render('admin.pages.jobs.view-index-jobs', compact('totalJobs'));
        } catch (Throwable $t)  {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @return Application|Factory|View
     * View para criar as vagas
     */
    public function viewCreateJobs()
    {
        $sectors = Sectors::all();
        return view('admin.pages.jobs.view-create-jobs', compact('sectors'));
    }

    /**
     * @param JobsCreateRequest $request
     * @return RedirectResponse
     * Método para criar as vagas
     */
    public function createJobs(JobsCreateRequest $request): RedirectResponse
    {
        try {

            $attributes = $request->validated();

            Jobs::query()->create([
                'sector_id' => $attributes['sector_id'],
                'name' => $attributes['name'],
                'description' => $attributes['description'],
                'status' => $attributes['status'],
            ]);
            UserNotification::success('Vaga criada com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar vaga!');
        }
        return redirect()->route('jobs');
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     * View de edição de vagas
     */
    public function viewUpdateJobs($id): View|Factory|RedirectResponse|Application
    {
        try {
            $sectors = Sectors::all();
            $jobs = $this->jobs::query()->findOrFail($id);
            return view('admin.pages.jobs.view-update-jobs', compact('jobs', 'sectors'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar vaga!');
        }
        return redirect()->route('jobs');
    }

    /**
     * @param JobsUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * Método para atualizar as vagas
     */
    public function updateJobs(JobsUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $attributes = $request->validated();
            $this->jobs::query()->findOrFail($id)->update([
                'sector_id' => $attributes['sector_id'],
                'name' => $attributes['name'],
                'description' => $attributes['description'],
                'status' => $attributes['status'],
            ]);
            UserNotification::success('Vaga atualizada com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar vaga!');
        }
        return redirect()->route('jobs');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * Método para deletar as vagas
     */
    public function deleteJobs($id): RedirectResponse
    {
        try {
            $this->jobs::query()->findOrFail($id)->delete();
            UserNotification::success('Vaga deletada com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar vaga!');
        }
        return redirect()->route('jobs');
    }

    /**
     * @param ResumesDataTable $dataTable
     * @param $id
     * @return mixed
     * View para visualizar as os currículos recebidos
     */
    public function viewReceivedJobs(ResumesDataTable $dataTable, $id): mixed
    {
        try {
            $countJobs = $this->jobs->with('resumes')->find($id);
            $jobs = $this->jobs->with('resumes')->find($id);
            return $dataTable->render('admin.pages.jobs.view-received-jobs', compact('jobs', 'countJobs'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao visualizar vagas recebidas!');
        }
        return redirect()->route('jobs');
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     * View para visualizar os detalhes dos currículos recebidos
     */
    public function viewDetailsResumes($id): View|Factory|RedirectResponse|Application
    {
        try {
            $resumes = Resumes::query()->where('id', $id)
                ->with('job')
                ->get();

            return view('admin.pages.jobs.view-details-resumes', compact('resumes'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao visualizar detalhes do currículo!');
        }
        return redirect()->route('jobs');
    }

    /*
     * @param $id
     * @return RedirectResponse
     * Método para deletar os currículos recebidos
     */
    public function deleteResume($id): RedirectResponse
    {
        try {
            Resumes::query()->findOrFail($id)->delete();
            UserNotification::success('Currículo deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar currículo!');
        }
        return redirect()->back();
    }

}
