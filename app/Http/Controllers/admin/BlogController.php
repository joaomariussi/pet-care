<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Blog\CategoriesBlogCreateRequest;
use App\Http\Requests\admin\Blog\NoticesBlogRequest;
use App\Models\admin\CategoriesBlog;
use App\Models\admin\NoticesBlog;
use App\Notifications\UserNotification;
use Exception;
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
    public function index()
    {
        try {
            return view('admin.pages.blog.view-index');
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function indexCategories()
    {
        try {
            return view('admin.pages.blog.view-index-categories');
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function viewCreateCategories()
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
     */
    public function viewCreateNotices()
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
}
