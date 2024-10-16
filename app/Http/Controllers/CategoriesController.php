<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\Categories\CategoriesCreateRequest;
use App\Http\Requests\Categories\CategoriesUpdateRequest;
use App\Models\Categories;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoriesController extends Controller
{
    public function __construct(Categories $categories)
    {
        config(['view.active_sidebar' => 'categories/']);
        $this->categories = $categories;
    }

    /**
     * Carrega a DataTable de categorias
     * @param CategoriesDataTable $datatable
     * @return mixed
     * @throws Exception
     */
    public function index(CategoriesDataTable $datatable): mixed
    {
        try {
            // Busca o total de categorias
            $totalCategories = Categories::count();
            return $datatable->render('admin.pages.categories.view-index', compact('totalCategories'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * View de cadastro de categorias
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewCreateCategories() : View|Factory|RedirectResponse|Application
    {
        try {
            return view('admin.pages.categories.view-create');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de cadastro de categorias!');
        }

        return redirect()->route('categories');
    }

    /**
     * Cadastra uma nova categoria
     * @param CategoriesCreateRequest $request
     * @return RedirectResponse
     */
    public function create(CategoriesCreateRequest $request): RedirectResponse
    {
        try {
            // Valida os dados
            $data = $request->validated();

            // Salva os dados no banco de dados
            $this->categories::query()->create($data);

            UserNotification::success('Categoria cadastrada com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar a categoria!');
        }

        return redirect()->route('categories');
    }

    /**
     * View de atualização de categorias
     * @param int $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateCategories(int $id): View|Factory|RedirectResponse|Application
    {
        try {
            // Busca a categoria
            $category = $this->categories::query()->findOrFail($id);

            return view('admin.pages.categories.view-update', compact('category'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao buscar a página de atualização de categorias!');
        }

        return redirect()->route('categories');
    }

    /**
     * Atualiza uma categoria
     * @param CategoriesUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoriesUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            // Busca a categoria
            $category = $this->categories::query()->findOrFail($id);

            // Valida os dados
            $data = $request->validated();

            // Atualiza os dados no banco de dados
            $category->update($data);

            UserNotification::success('Categoria atualizada com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar a categoria!');
        }

        return redirect()->route('categories');
    }

    /**
     * Exclui uma categoria
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            // Busca a categoria
            $category = $this->categories::query()->findOrFail($id);

            // Verifica se há serviços associados a essa categoria
            if ($category->services()->count() > 0) {
                UserNotification::error('Não é possível excluir a categoria, pois existem serviços associados a ela.');
                return redirect()->route('categories');
            }

            // Exclui a categoria
            $category->delete();
            UserNotification::success('Categoria excluída com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao excluir a categoria!');
        }

        return redirect()->route('categories');
    }
}
