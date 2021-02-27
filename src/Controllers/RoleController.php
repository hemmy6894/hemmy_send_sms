<?php

namespace Hemmy\RoleManamger\Controllers;

class RoleController {
    public static function print_array($array = [])
    {
        $value = config('hemmy.name')??"Hemmy Test";
        echo $value . "<br />";
        print_r($array);
    }
}