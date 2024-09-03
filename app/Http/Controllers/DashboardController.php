<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        config(['view.active_sidebar' => 'admin/']);
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
}
