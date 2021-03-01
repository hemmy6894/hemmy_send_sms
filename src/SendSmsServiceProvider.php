<?php

namespace Hemmy\SendSms;

use Illuminate\Support\ServiceProvider;

class SendSmsServiceProvider extends ServiceProvider
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
            __DIR__.'/../config/hemmy_next_sms.php',
            'hemmy_next_sms'
        );
    }

    public function publish_all($tag='hemmy_next_sms'){
        $this->publishes([
            __DIR__.'/../config/hemmy_next_sms.php' => config_path('hemmy_next_sms.php'),
        ], $tag);
    }
}