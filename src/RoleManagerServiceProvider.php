<?php

namespace Hemmy\RoleManamger;

use Illuminate\Support\ServiceProvider;

class RoleManagerServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/hemmy_role_manager.php' => config_path('hemmy_role_manager.php'),
        ], 'hemmy_role_manager');
    }

    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/hemmy_role_manager.php',
            'hemmy_role_manager'
        );
    }
}