<?php

namespace App\Http\Controllers\admin;

use App\DataTables\SectorsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Sectors\SectorsCreateRequest;
use App\Http\Requests\admin\Sectors\SectorsUpdateRequest;
use App\Models\admin\Sectors;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;


class SectorsController extends Controller
{
    private Sectors $sectors;

    public function __construct(Sectors $sectors)
    {
        config(['view.active_sidebar' => 'sectors/']);
        $this->sectors = $sectors;
    }

    /**
     * @return View|Factory|Application
     * Retorna view da lista de setores
     * @throws Exception
     */
    public function index(SectorsDataTable $datatable): mixed
    {
        try {
            $totalSectors = Sectors::count();

            return $datatable->render('admin.pages.sectors.view-index', compact('totalSectors'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @return View|Factory|Application
     * Retorna view de criação de setor
     */
    public function viewCreateSector(): View|Factory|Application
    {
        return view('admin.pages.sectors.view-create-sector');
    }

    /**
     * @throws Exception
     * Cria um novo setor
     */
    public function createSector(SectorsCreateRequest $request): RedirectResponse
    {
        try {
            $sector = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $sector['avatar'] = $imageBase64;
            }
            $sector['status'] = $request->status == 'on' ? 1 : 0;
            $this->sectors::query()->create($sector);
            UserNotification::success('Setor criado com sucesso!');

        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar setor!');
            return redirect()->back()->withInput();
        }
        return redirect()->route('sectors');
    }

    /**
     * @throws Exception
     * View de Atualização dos setores
     */
    public function viewUpdateSector($id): View|Factory|RedirectResponse|Application
    {
        try {
            $sector = $this->sectors::query()->findOrFail($id);
            return view('admin.pages.sectors.view-update-sector', compact('sector'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar setor.');
        }
        return redirect()->route('sectors');
    }

    /**
     * @throws Exception
     * Atualiza um setor
     */
    public function updateSector(SectorsUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $sector = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $sector['avatar'] = $imageBase64;
            }
            $this->sectors::query()->findOrFail($id)->update($sector);
            UserNotification::success('Setor atualizado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar setor.');
            return redirect()->back()->withInput();
        }
        return redirect()->route('sectors');
    }

    /**
     * @throws Exception
     * Deleta um setor
     */
    public function deleteSector($id): RedirectResponse
    {
        try {
            $this->sectors::query()->findOrFail($id)->delete();
            UserNotification::success('Setor deletado com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar setor.');
        }
        return redirect()->route('sectors');
    }
}
