<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
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
            $home = HomeConfig::query()->first();
            return view('site.index', compact('home'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao carregar a página inicial!');
        }
        return view('site.index');
    }
}
