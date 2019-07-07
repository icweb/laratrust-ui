<?php

namespace Icweb\Trusty\App\Providers;

use Illuminate\Support\ServiceProvider;

class TrustyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '../../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '../../resources/views/', 'trusty');

        $this->publishes([
            __DIR__ . '../../resources/views/' => resource_path('views/vendor/trusty'),
            __DIR__ . '../../config/trusty.php' => config_path('trusty.php'),
        ], 'trusty');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
