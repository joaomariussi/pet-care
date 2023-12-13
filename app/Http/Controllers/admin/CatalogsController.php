<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CatalogsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Catalogs\CatalogsCreateRequest;
use App\Models\admin\Catalogs;
use App\Notifications\UserNotification;
use App\Traits\FileTrait;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class CatalogsController extends Controller
{

    use FileTrait;

    /*
     * @var Catalogs
     */
    private Catalogs $catalogs;

    /*
     * CatalogsController constructor.
     */
    public function __construct(Catalogs $catalogs)
    {
        config(['view.active_sidebar' => 'catalogs/']);
        $this->catalogs = $catalogs;
    }

    /*
     * View Index Catalog
     */
    /**
     * @throws Exception
     */
    public function index(CatalogsDataTable $dataTable): mixed
    {
        try {
            $totalCatalogs = Catalogs::count();

            return $dataTable->render('admin.pages.catalogs.view-index', compact('totalCatalogs'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /*
    * View Create Catalog
    */
    public function viewCreateCatalog()
    {
        return view('admin.pages.catalogs.view-create-catalog');
    }


    /**
     * @info Create Catalog
     * @param CatalogsCreateRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function create(CatalogsCreateRequest $request): RedirectResponse
    {

        try {
            $attributes = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $attributes['avatar'] = $imageBase64;
            }
            $file = $request->file('fileUpload');
            $saveFile = $this->saveLocal($file, 'catalogs', $file->getClientOriginalName());
            $attributes['fileUpload'] = $saveFile['file_name'];
            $this->catalogs::query()->create($attributes);
            UserNotification::success('Catálogo criado com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar catálogo', 'Não foi possível criar o catálogo');
            return redirect()->back()->withInput();
        }
        return redirect()->route('catalogs.view-create');
    }

    /**
     * @info View de update dos catálogos
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateCatalog($id): View|Factory|RedirectResponse|Application
    {
        try {
            $catalogs = $this->catalogs::query()->find($id);
            return view('admin.pages.catalogs.view-update-catalog', compact('catalogs'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar catálogo', 'Não foi possível atualizar o catálogo');
            return redirect()->back()->withInput();
        }
    }

    /**
     * @info Update Catalog
     * @param CatalogsCreateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CatalogsCreateRequest $request, $id): RedirectResponse
    {
        try {
            $attributes = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $attributes['avatar'] = $imageBase64;
            }
            $file = $request->file('fileUpload');
            $saveFile = $this->saveLocal($file, 'catalogs', $file->getClientOriginalName());
            $attributes['fileUpload'] = $saveFile['file_name'];
            $this->catalogs::query()->find($id)->update($attributes);
            UserNotification::success('Catálogo atualizado com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar catálogo', 'Não foi possível atualizar o catálogo');
        }
        return redirect()->back()->withInput();
    }

    /**
     * @info Delete Catalog
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            $this->catalogs::query()->find($id)->delete();
            UserNotification::success('Catálogo deletado com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar catálogo', 'Não foi possível deletar o catálogo');
        }
        return redirect()->back()->withInput();
    }
}
