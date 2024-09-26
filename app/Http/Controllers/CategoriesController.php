<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\Categories\CategoriesRequest;
use App\Http\Requests\Categories\CategoriesUpdateRequest;
use App\Models\Categories;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * Carrega a DataTable de Categorias
     * @throws Exception
     */
    public function index(CategoriesDataTable $datatable): mixed
    {
        try {
            $totalCategories = Categories::count();
            return $datatable->render('admin.pages.categories.view-index', compact('totalCategories'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

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

    public function create(CategoriesRequest $request): RedirectResponse
    {
        try {
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

    public function delete($id): RedirectResponse
    {
        try {
            // Busca a categoria
            $category = $this->categories::query()->findOrFail($id);

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
