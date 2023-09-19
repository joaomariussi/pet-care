<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class CatalogsController extends Controller
{

    public function __construct()
    {
        config(['view.active_sidebar' => 'catalogs/']);
    }

    public function index()
    {
        return view('admin.pages.catalogs.view-index');
    }

    public function viewCreateCatalog()
    {
        return view('admin.pages.catalogs.view-create-catalog');
    }
}
