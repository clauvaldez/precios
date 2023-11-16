<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //para afuera
        // if (env('APP_ENV') == 'local') {
        //     URL::forceScheme('https');
        // }

        //para adentro
        // if (env('APP_ENV') == 'local') {
        //     URL::forceScheme('http');
        // }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
