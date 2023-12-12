<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\admin\Catalogs;
use App\Models\admin\CategoriesBlog;
use App\Models\admin\HomeConfig;
use App\Notifications\UserNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class SiteController extends Controller
{

    public function index(): View|Application|Factory|RedirectResponse|null
    {
        try {
            $catalogs = Catalogs::query()->where('status', '=', '1')->get();
            $home = HomeConfig::query()->first();
            $notices = CategoriesBlog::query()->with('noticesBlog')->where('status', '=', '1')->get();
            return view('site.index', compact('home', 'catalogs', 'notices'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao carregar a página inicial!');
        }
        return view('site.index');
    }
}
