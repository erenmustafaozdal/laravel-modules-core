<?php

namespace ErenMustafaOzdal\LaravelModulesCore;

use ErenMustafaOzdal\LaravelModulesCore\Services\ValidationService;
use Illuminate\Support\ServiceProvider;

class LaravelModulesCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-modules-core');
        $this->publishes([
            __DIR__.'/../resources/lang' => base_path('resources/lang/vendor/laravel-modules-core'),
        ]);

        $this->publishes([
            __DIR__.'/../config/laravel-modules-core.php' => config_path('laravel-modules-core.php')
        ], 'config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-modules-core');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-modules-core'),
        ]);

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/laravel-modules-core'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Caffeinated\Menus\MenusServiceProvider');

        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-modules-core.php', 'laravel-modules-core'
        );

        // register services
        $this->registerValidationService();

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('LMCValidation', 'ErenMustafaOzdal\LaravelModulesCore\Facades\Validation');
        });
    }

    /**
     * Registers the validation service
     *
     * @return void
     */
    protected function registerValidationService()
    {
        $this->app->singleton('laravelmodulescore.validation', function ($app) {
            return new ValidationService();
        });
    }
}
