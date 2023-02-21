<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     Paginator::useBootstrapFive();

     Route::resourceVerbs([
     'create' => 'crear',
     'edit' => 'editar',
     'show' => 'mostrar',
     'index' => 'indice'
     ]);
    }

}
