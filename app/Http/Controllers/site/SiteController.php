<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\admin\Catalogs;
use App\Models\admin\CategoriesBlog;
use App\Models\admin\HomeConfig;
use App\Models\admin\NoticesBlog;
use App\Notifications\UserNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Throwable;

class SiteController extends Controller
{

    /**
     * @info Retorna a view inical do site
     * @return View|Factory|Application|RedirectResponse|null
     */
    public function index(): View|Application|Factory|RedirectResponse|null
    {
        try {
            if (Cache::has('catalogs')) {
                $catalogs = Cache::get('catalogs');
            } else {
                $catalogs = Cache::remember('catalogs', now()->addHours(12), function () {
                    return Catalogs::query()->where('status', '=', '1')->get();
                });
            }

            if (Cache::has('home')) {
                $home = Cache::get('home');
            } else {
                $home = Cache::remember('home', now()->addHours(12), function () {
                    return HomeConfig::query()->first();
                });
            }

            $notices = NoticesBlog::query()->with('categoryBlog')
                ->where('status', '=', '1')
                ->whereHas('categoryBlog', function ($query) {
                    $query->where('status', '=', '1');
                })
                ->orderBy('id', 'desc')
                ->limit(3)
                ->get();
            return view('site.index', compact('home', 'catalogs', 'notices'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao carregar a página inicial!');
        }
        return view('site.index');
    }
}
