<?php

namespace Hemmy\RoleManager;

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
        $this->publish_all();
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

    public function publish_all($tag='hemmy_role_manager'){
        $this->publishes([
            __DIR__.'/../config/hemmy_role_manager.php' => config_path('hemmy_role_manager.php'),
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], $tag);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/hemmy.php');
    }
}