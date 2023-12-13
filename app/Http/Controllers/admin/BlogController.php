<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CategoriesBlogDataTable;
use App\DataTables\NoticesBlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Blog\CategoriesBlogCreateRequest;
use App\Http\Requests\admin\Blog\NoticesBlogRequest;
use App\Http\Requests\admin\Blog\NoticesBlogUpdateRequest;
use App\Models\admin\CategoriesBlog;
use App\Models\admin\NoticesBlog;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class BlogController extends Controller
{

    private CategoriesBlog $categoriesBlog;
    private NoticesBlog $noticesBlog;

    /**
     * BlogController constructor.
     */
    public function __construct(CategoriesBlog $categoriesBlog, NoticesBlog $noticesBlog)
    {
        config(['view.active_sidebar' => 'blog/']);
        $this->categoriesBlog = $categoriesBlog;
        $this->noticesBlog = $noticesBlog;
    }

    /**
     * @throws Exception
     */
    public function index(NoticesBlogDataTable $datatable): mixed
    {
        try {
            return $datatable->render('admin.pages.blog.view-index');
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function indexCategories(CategoriesBlogDataTable $datatable): mixed
    {
        try {
            return $datatable->render('admin.pages.blog.view-index-categories');
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function viewCreateCategories(): View|Factory|RedirectResponse|Application
    {
        try {
            return view('admin.pages.blog.view-create-categories');
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     * Cria uma nova categoria do Blog
     */
    public function createCategories(CategoriesBlogCreateRequest $request): RedirectResponse
    {
        try {
            $category = $request->validated();
            $this->categoriesBlog::query()->create($category);
            UserNotification::success('Categoria do Blog criada com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar categoria do Blog');
        }
        return redirect()->route('blog.view-index-categories');
    }

    /**
     * @throws Exception
     * View de edição das categorias do Blog
     */
    public function viewUpdateCategories($id): View|Factory|RedirectResponse|Application
    {
        try {
            $category = $this->categoriesBlog::query()->find($id);
            return view('admin.pages.blog.view-update-categories', compact('category'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao editar categoria do Blog');
            return redirect()->route('blog.view-update-categories', $id);
        }
    }


    /**
     * @throws Exception
     * Atualiza uma categoria do Blog
     */
    public function updateCategories(CategoriesBlogCreateRequest $request, $id)
    {
        try {
            $category = $this->categoriesBlog::query()->find($id);
            $category->update($request->validated());
            UserNotification::success('Categoria do Blog atualizada com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar categoria do Blog');
            return redirect()->route('blog.view-update-categories', $id);
        }
        return redirect()->route('blog.view-update-categories', $id);
    }

    /**
     * @throws Exception
     * Deleta uma categoria do Blog
     */
    public function deleteCategories($id): RedirectResponse
    {
        try {
            $category = $this->categoriesBlog::query()->find($id);
            $category->delete();
            UserNotification::success('Categoria do Blog deletada com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar categoria do Blog');
            return redirect()->route('blog.view-index-categories');
        }
    }

    /**
     * @throws Exception
     */
    public function viewCreateNotices(): View|Factory|RedirectResponse|Application
    {
        try {
            $categories = $this->categoriesBlog::all();
            return view('admin.pages.blog.view-create-notices', compact('categories'));
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     * Cria uma nova notícia do Blog
     */
    public function createNotices(NoticesBlogRequest $request): RedirectResponse
    {
        try {
            $notices = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $notices['avatar'] = $imageBase64;
            }
            $this->noticesBlog::query()->create($notices);
            UserNotification::success('Notícia do Blog criada com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar notícia do Blog');
            return redirect()->route('blog.view-create-notices');
        }
        return redirect()->route('blog');
    }

    /**
     * @throws Exception
     * View de Atualizção de uma notícia do Blog
     */
    public function viewUpdateNotices($id): View|Factory|RedirectResponse|Application
    {
        try {
            $notice = $this->noticesBlog::query()->find($id);
            $categories = $this->categoriesBlog::all();
            return view('admin.pages.blog.view-update-notices', compact('notice', 'categories'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao editar notícia do Blog');
            return redirect()->route('blog.view-update-notices', $id);
        }
    }

    /**
     * @throws Exception
     * Atualiza as notícias do Blog
     */
    public function updateNotices(NoticesBlogUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $notice = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $notice['avatar'] = $imageBase64;
            }
            $this->noticesBlog::query()->find($id)->update($notice);
            UserNotification::success('Notícia do Blog editada com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao editar notícia do Blog');
            return redirect()->route('blog.view-update-notices', $id);
        }
        return redirect()->route('blog.view-update-notices', $id);
    }

    /**
     * @throws Exception
     * Deleta uma notícia do Blog
     */
    public function deleteNotices($id): RedirectResponse
    {
        try {
            $this->noticesBlog::query()->find($id)->delete();
            UserNotification::success('Notícia do Blog deletada com sucesso');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar notícia do Blog');
            return redirect()->route('blog');
        }
        return redirect()->route('blog');
    }
}
