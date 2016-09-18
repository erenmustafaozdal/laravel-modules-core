<?php

namespace ErenMustafaOzdal\LaravelModulesCore;

use ErenMustafaOzdal\LaravelModulesCore\Services\ValidationService;
use ErenMustafaOzdal\LaravelModulesCore\Services\BreadcrumbService;
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
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-modules-core');
        $this->publishes([
            __DIR__.'/../resources/lang' => base_path('resources/lang/vendor/laravel-modules-core'),
        ]);

        $this->publishes([
            __DIR__.'/../config/laravel-modules-core.php'   => config_path('laravel-modules-core.php')
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
        $this->app->register('Illuminate\Html\HtmlServiceProvider');
        $this->app->register('Caffeinated\Menus\MenusServiceProvider');
        $this->app->register('Barryvdh\Elfinder\ElfinderServiceProvider');

        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-modules-core.php', 'laravel-modules-core'
        );
        // merge default configs with publish configs
        $this->mergeDefaultConfig();

        $router = $this->app['router'];
        $router->middleware('theme_api',\ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\ApiTheme::class);

        // register services
        $this->registerValidationService();
        $this->registerBreadcrumbService();

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Html', 'Illuminate\Html\HtmlFacade');
            $loader->alias('Form', 'Illuminate\Html\FormFacade');
            $loader->alias('LMCValidation', 'ErenMustafaOzdal\LaravelModulesCore\Facades\Validation');
            $loader->alias('LMCBreadcrumb', 'ErenMustafaOzdal\LaravelModulesCore\Facades\Breadcrumb');
        });

        // elfinder config override
        $config = $this->app['config']->get('laravel-modules-core.elfinder', []);
        $this->app['config']->set('elfinder', $config);
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

    /**
     * Registers the breadcrumb service
     *
     * @return void
     */
    protected function registerBreadcrumbService()
    {
        $this->app->singleton('laravelmodulescore.breadcrumb', function ($app) {
            return new BreadcrumbService();
        });
    }

    /**
     * merge default configs with publish configs
     */
    protected function mergeDefaultConfig()
    {
        $config = $this->app['config']->get('laravel-modules-core', []);
        $default = require __DIR__.'/../config/default.php';

        $config['packages'] = $default['packages'];
        $config['elfinder']['dir'] = $default['elfinder']['dir'];
        $config['elfinder']['disks'] = $default['elfinder']['disks'];
        $config['elfinder']['route']['prefix'] = $default['elfinder']['route']['prefix'];
        $config['elfinder']['access'] = $default['elfinder']['access'];
        $config['elfinder']['roots'] = $default['elfinder']['roots'];
        $config['elfinder']['options'] = $default['elfinder']['options'];

        $this->app['config']->set('laravel-modules-core', $config);
    }
}
