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
            $this->topbarUserMenu();
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

            }
            $menu->add(trans('laravel-user-module::admin.profile'),['route' => ['admin.user.show', 'id' => $this->user->id]] )
                ->attribute('active', 'admin.user.show')
                ->attribute('data-icon', 'user');

            $menu->add(trans('laravel-user-module::admin.logout'),['route' => 'getLogout'] )
                ->attribute('data-icon', 'sign-out');
        });
    }

    /**
     * Admin side bar menu
     */
    public function sidebarMenu()
    {
        Menu::make('sidebar', function ($menu)
        {
            // user menus
            $user = $menu->add(trans('laravel-user-module::admin.menu.user.root'), 'javascript:;')
                ->attribute('data-icon', 'user')
                ->attribute('active', 'admin.user');
            $user->add(trans('laravel-user-module::admin.menu.user.all'), ['route' => 'admin.user.index'])
                ->attribute('active', 'admin.user');
            $user->add(trans('laravel-user-module::admin.menu.user.add'), ['route' => 'admin.user.create'])
                ->attribute('data-icon', 'plus')
                ->attribute('active', 'admin.user');

            // role menus
            $role = $menu->add(trans('laravel-user-module::admin.menu.role.root'), 'javascript:;')
                ->attribute('data-icon', 'users')
                ->attribute('active', 'admin.role');
            $role->add(trans('laravel-user-module::admin.menu.role.all'), ['route' => 'admin.role.index'])
                ->attribute('active', 'admin.role');
            $role->add(trans('laravel-user-module::admin.menu.role.add'), ['route' => 'admin.role.create'])
                ->attribute('data-icon', 'plus')
                ->attribute('active', 'admin.role');
        });
    }

    /**
     * Admin top bar user menu
     */
    public function topbarUserMenu()
    {
        Menu::make('topbarUser', function ($menu)
        {
            $menu->add(trans('laravel-user-module::admin.profile'),['route' => ['admin.user.show', 'id' => $this->user->id]] )
                ->attribute('active', 'admin.user.show')
                ->attribute('data-icon', 'user');

            $menu->add(trans('laravel-user-module::admin.logout'),['route' => 'getLogout'] )
                ->attribute('data-icon', 'sign-out');
        });
    }
}
