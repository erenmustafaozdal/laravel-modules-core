<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware;

use Closure;
use Caffeinated\Menus\Facades\Menu;
use Sentinel;

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
            foreach( config('laravel-modules-core.menus.action') as $action ) {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess($action['route']) ) {
                    $menu->add(trans($action['trans']),['route' => $action['route']] )
                        ->attribute('data-icon', $action['icon']);
                }
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
            $this->sideMenuDetect($menu,config('laravel-modules-core.menus.side'));
        });
    }

    /**
     * side bar menu detect
     *
     * @param Menu $menu
     * @param array $elements
     * @return Menu $menu
     */
    private function sideMenuDetect($menu, $elements)
    {
        foreach($elements as $element) {
            $access = is_array($element['access']) ? Sentinel::hasAnyAccess($element['access']) : Sentinel::hasAccess($element['access']);

            if (Sentinel::getUser()->is_super_admin || $access) {
                $route = $element['route'] === 'javascript:;' ? $element['route'] : ['route' => $element['route']];

                $part = $menu->add(trans($element['trans']), $route)
                    ->attribute('data-icon', $element['icon'])
                    ->attribute('active', $element['active']);
                if (isset($element['child'])) {
                    $this->sideMenuDetect($part,$element['child']);
                }

            }
        }
        return $menu;
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
