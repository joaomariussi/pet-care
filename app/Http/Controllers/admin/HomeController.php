<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class HomeController extends Controller
{
    public function __construct()
    {
        config(['view.active_sidebar' => 'home/']);
    }

    public function index(): View|Factory|Application|RedirectResponse|null
    {
        try {
            return view('admin.pages.home.view-index');
        } catch (Throwable $t) {
            return applicationError($t);
        }
    }
}
