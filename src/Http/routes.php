<?php
//max level nested function 100 hatasını düzeltiyor
ini_set('xdebug.max_nesting_level', 300);

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'api',
    'middleware' => ['auth'],
    'namespace' => 'ErenMustafaOzdal\LaravelModulesCore\Http\Controllers'
], function()
{
    /*==========  Theme  ==========*/
    Route::controller('theme', 'ThemeController', [
        'getThemeChange'        => 'api.theme.change',
    ]);
});