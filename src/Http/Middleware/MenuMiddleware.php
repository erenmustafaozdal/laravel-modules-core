<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware;

use Closure;
use Caffeinated\Menus\Facades\Menu;
use Caffeinated\Menus\Builder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class MenuMiddleware
{
    /**
     * authenticated user
     *
     * @var \Cartalyst\Sentinel\Users\EloquentUser|null
     */
    private $user;

    /**
     * menu middleware construct metod
     */
    public function __construct()
    {
        $this->user = Sentinel::getUser();
    }
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! is_null($this->user) )
        {
            $this->actionsMenu();
            $this->sidebarMenu();
            $this->topbarUserLoginMenu();
        }
        return $next($request);
    }

    /**
     * Admin Actions Menu
     */
    public function actionsMenu()
    {
        Menu::make('actions', function ($menu)
        {
            if ( ! is_null(app()->getProvider(config('laravel-modules-core.packages.laravel-user-module')))) {
                $menu->add(trans('laravel-modules-core::laravel-user-module/admin.menu.user.add'),['route' => 'admin.user.create'] )
                    ->attribute('data-icon', 'icon-user'); // simple-line-icons
            }
        });
    }

    /**
     * Admin side bar menu
     */
    public function sidebarMenu()
    {
        Menu::make('sidebar', function ($menu)
        {
            // laravel user module | User & Role
            if ( ! is_null(app()->getProvider(config('laravel-modules-core.packages.laravel-user-module')))) {
                $user = $menu->add(trans('laravel-modules-core::laravel-user-module/admin.menu.user.root'), 'javascript:;')
                    ->attribute('data-icon', 'icon-user')
                    ->attribute('active', 'admin.user');
                $user->add(trans('laravel-modules-core::laravel-user-module/admin.menu.user.all'), ['route' => 'admin.user.index'])
                    ->attribute('data-icon', 'icon-list')
                    ->attribute('active', 'admin.user');
                $user->add(trans('laravel-modules-core::laravel-user-module/admin.menu.user.add'), ['route' => 'admin.user.create'])
                    ->attribute('data-icon', 'icon-plus')
                    ->attribute('active', 'admin.user');

                $role = $menu->add(trans('laravel-modules-core::laravel-user-module/admin.menu.role.root'), 'javascript:;')
                    ->attribute('data-icon', 'icon-users')
                    ->attribute('active', 'admin.role');
                $role->add(trans('laravel-modules-core::laravel-user-module/admin.menu.role.all'), ['route' => 'admin.role.index'])
                    ->attribute('data-icon', 'icon-list')
                    ->attribute('active', 'admin.role');
                $role->add(trans('laravel-modules-core::laravel-user-module/admin.menu.role.add'), ['route' => 'admin.role.create'])
                    ->attribute('data-icon', 'icon-plus')
                    ->attribute('active', 'admin.role');
            }
        });
    }

    /**
     * Admin top bar user menu
     */
    public function topbarUserLoginMenu()
    {
        Menu::make('topbarUserLogin', function ($menu)
        {
            $menu->add(trans('laravel-modules-core::admin.profile'),['route' => ['admin.user.show', 'id' => $this->user->id]] )
                ->attribute('active', 'admin.user.show')
                ->attribute('data-icon', 'icon-user'); // simple-line-icons

            $menu->add(trans('laravel-modules-core::admin.logout'),['route' => 'getLogout'] )
                ->attribute('data-icon', 'icon-logout'); // simple-line-icons
        });
    }
}
