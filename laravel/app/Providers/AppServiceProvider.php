<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // since it would be using HTTP inside docker
        // need to ensure that all paths generated with HTTPS
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
