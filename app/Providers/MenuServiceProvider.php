<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // obter todos os dados do arquivo menu.json
        $MenuJson = file_get_contents(base_path('resources/data/menus/menu.json'));
        $MenuData = json_decode($MenuJson);

        // compartilhar todos os dados do menu para todas as visualizações
        View::share('menuData',[$MenuData]);
    }
}
