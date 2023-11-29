<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Catalogs\CatalogsCreateRequest;
use App\Models\admin\Catalogs;
use App\Notifications\UserNotification;
use App\Traits\FileTrait;
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
    public function index()
    {
        return view('admin.pages.catalogs.view-index');
    }

    /*
    * View Create Catalog
    */
    public function viewCreateCatalog()
    {
        return view('admin.pages.catalogs.view-create-catalog');
    }

    public function create(CatalogsCreateRequest $request): RedirectResponse
    {

        try {
            // Obtenha os dados do formulário
            $data = $request->only(['name', 'status']);

            $request['avatar'] = $this->imageUpload('/imageCatalogs', $request['avatar']);
            $request['fileUpload'] = $this->pdfUpload('/pdfCatalogs', $request['fileUpload']);

            $data['avatar'] = $request['avatar'];
            $data['fileUpload'] = $request['fileUpload'];

            // Crie o catálogo
            $this->catalogs::query()->create($data);

            UserNotification::success('Catálogo criado com sucesso');
        } catch (Throwable $t) {
            dd($t->getMessage());
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar catálogo', 'Não foi possível criar o catálogo');
            return redirect()->back()->withInput();
        }
        return redirect()->route('catalogs.view-create');
    }
}
