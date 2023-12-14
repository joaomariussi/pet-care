<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\admin\CategoriesBlog;
use App\Models\admin\NoticesBlog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class NoticesBlogController extends Controller
{

    /*
     * @var NoticesBlog
     */
    public function viewDetailsNotices($id): View|Factory|Application|RedirectResponse
    {
        try {
            $noticeBlog = NoticesBlog::query()
                ->with('categoryBlog')
                ->where('id', $id)
                ->first();
            $categories = CategoriesBlog::query()
                ->with('noticesBlog')
                ->where('status', '1')
                ->get();
            return view('site.notices-blog.view-details-notices', compact('noticeBlog', 'categories'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @info View para visualizar todas as noticias do Blog
     * @return View|Factory|Application|RedirectResponse
     */
    public function viewAllNotices(): View|Factory|Application|RedirectResponse
    {
        try {
            $categories = CategoriesBlog::query()->where('status', '1')->get();
            $notices = NoticesBlog::query()->with('categoryBlog')
                ->where('status', '=', '1')
                ->whereHas('categoryBlog', function ($query) {
                    $query->where('status', '=', '1');
                })
                ->orderBy('id', 'desc')
                ->paginate(8);
            return view('site.notices-blog.view-all-notices', compact('notices', 'categories'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @info View para visualizar os blogs dividios por categorias
     * @param $name_category
     * @return View|Factory|Application|RedirectResponse
     */
    public function viewNoticeCategory($name_category): View|Factory|Application|RedirectResponse
    {
        try {
            $activeCategoryId = $name_category;

            $slug = Str::slug($name_category);

            $notices = CategoriesBlog::query()->with('noticesBlog')->where('name_category', $name_category)
                ->where('name_category', $slug)
                ->where('status', '1')
                ->first();
            $allCategories = CategoriesBlog::query()->where('status', '1')->get();
            return view('site.notices-blog.view-notice-category', compact('notices', 'allCategories', 'activeCategoryId'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back();
        }
    }
}
