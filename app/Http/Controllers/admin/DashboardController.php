<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\site\Notifications;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        config(['view.active_sidebar' => 'dashboard/']);
    }

    /**
     * @return Application|Factory|View|RedirectResponse|null
     */
    public function index(): View|Factory|Application|RedirectResponse|null
    {
        try {
            return view('admin.pages.dashboard.view-index');
        } catch (Throwable $t) {
            return applicationError($t);
        }
    }

    /**
     * @return Application|Factory|View|RedirectResponse|null
     * @throws Throwable
     * @info Mostrar todas as notificações
     */
    public function allNotifications(): View|Factory|Application|RedirectResponse|null
    {
        try {
            $notificationsAll = Notifications::where('read', true)
                ->latest()
                ->get();
            return view('admin.pages.dashboard.view-all-notifications', compact('notificationsAll'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back()->with('error', 'Erro ao carregar as notificações.');
        }
    }
}
