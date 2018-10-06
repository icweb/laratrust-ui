<?php

namespace IcWeb\TrustUi\App\Providers;

use Illuminate\Support\ServiceProvider;

class TrustUiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views/', 'trustui');

        $this->publishes([
            __DIR__ . '/../../resources/views/' => resource_path('views/vendor/trustui')
        ]);

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
