<?php

use Hemmy\RoleManager\Controllers\RoleController;

$middlewares = config('hemmy_role_manager.middlewares');

Route::middleware(
        $middlewares
    )->group(function(){
        Route::get('/hemmy_roles_settings', [RoleController::class,'display_roles'])->name('hemmy_roles_settings');
        Route::get('/hemmy_populate_roles', [RoleController::class,'populate_roles'])->name('hemmy_populate_roles');
        Route::post('/hemmy_change_roles', [RoleController::class,'change_roles'])->name('hemmy_change_roles');

        Route::resources(
            [
                'hemmy_role' => '\Hemmy\RoleManager\Controllers\RoleController',
                'hemmy_function' => '\Hemmy\RoleManager\Controllers\FunctionController',
            ]);
    }
);