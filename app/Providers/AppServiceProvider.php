<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Barryvdh\Debugbar\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //check that app is local

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        if(env(key:'APP_ENV') !== 'local'){
            URL::forceScheme(scheme:'https');
        }
    }
}
