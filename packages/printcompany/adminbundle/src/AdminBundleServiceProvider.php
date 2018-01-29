<?php

namespace PrintCompany\AdminBundle;

use Illuminate\Support\ServiceProvider;

class AdminBundleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('PrintCompany\AdminBundle\AdminBundleController');
    }
}
