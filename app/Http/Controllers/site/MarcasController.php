<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MarcasController extends Controller
{

    /**
     * @return View|Application|Factory|RedirectResponse
     */
    public function indexCasspet(): View|Application|Factory|RedirectResponse
    {
        return view('site.marcas.view-casspet');
    }

    /**
     * @return View|Application|Factory|RedirectResponse
     */
    public function indexImbativel(): View|Application|Factory|RedirectResponse
    {
        return view('site.marcas.view-imbativel');
    }

    /**
     * @return View|Application|Factory|RedirectResponse
     */
    public function indexLactomais(): View|Application|Factory|RedirectResponse
    {
        return view('site.marcas.view-lactomais');
    }

    /**
     * @return View|Application|Factory|RedirectResponse
     */
    public function indexThorxx(): View|Application|Factory|RedirectResponse
    {
        return view('site.marcas.view-thorxx');
    }

    /**
     * @return View|Application|Factory|RedirectResponse
     */
    public function indexSellenza(): View|Application|Factory|RedirectResponse
    {
        return view('site.marcas.view-sellenza');
    }
}
