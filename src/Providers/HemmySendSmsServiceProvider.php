<?php 
namespace Hemmy\SendSms\Providers;

use Illuminate\Support\ServiceProvider;
use Hemmy\SendSms\Services\HemmySendSmsService;

class HemmySendSmsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('hemmy-sms', function () {
            return new HemmySendSmsService();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/hemmy_next_sms.php' => config_path('hemmy_next_sms.php'),
        ], 'hemmy_next_sms');
    }
}
