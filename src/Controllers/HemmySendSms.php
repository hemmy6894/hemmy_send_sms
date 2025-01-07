<?php
namespace Hemmy\SendSms\Controllers;

use Illuminate\Support\Facades\Facade;

class HemmySendSms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hemmy-sms';
    }
}
