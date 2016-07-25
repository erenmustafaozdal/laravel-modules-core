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
            // laravel user module action menus
            if ( ! is_null(app()->getProvider(config('laravel-modules-core.packages.laravel-user-module')))) {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.user.create') ) {
                    $menu->add(lmcTrans('laravel-user-module/admin.menu.user.add'),['route' => 'admin.user.create'] )
                        ->attribute('data-icon', 'icon-user-follow');
                }
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.role.create') ) {
                    $menu->add(lmcTrans('laravel-user-module/admin.menu.role.add'),['route' => 'admin.role.create'] )
                        ->attribute('data-icon', 'icon-users');
                }
            }

            // laravel page module action menus
            if ( ! is_null(app()->getProvider(config('laravel-modules-core.packages.laravel-page-module')))) {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page_category.create') ) {
                    $menu->add(lmcTrans('laravel-page-module/admin.menu.page_category.add'),['route' => 'admin.page_category.create'] )
                        ->attribute('data-icon', 'icon-doc');
                }
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page.create') ) {
                    $menu->add(lmcTrans('laravel-page-module/admin.menu.page.add'),['route' => 'admin.page.create'] )
                        ->attribute('data-icon', 'icon-doc');
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
            // laravel user module | User & Role
            if ( ! is_null(app()->getProvider(config('laravel-modules-core.packages.laravel-user-module')))) {

                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAnyAccess(['admin.user.index', 'admin.user.create']) ) {
                    $user = $menu->add(lmcTrans('laravel-user-module/admin.menu.user.root'), 'javascript:;')
                        ->attribute('data-icon', 'icon-user')
                        ->attribute('active', 'admin.user');
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.user.index') ) {
                        $user->add(lmcTrans('laravel-user-module/admin.menu.user.all'), ['route' => 'admin.user.index'])
                            ->attribute('data-icon', 'icon-list')
                            ->attribute('active', 'admin.user.index');
                    }
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.user.create') ) {
                        $user->add(lmcTrans('laravel-user-module/admin.menu.user.add'), ['route' => 'admin.user.create'])
                            ->attribute('data-icon', 'icon-plus')
                            ->attribute('active', 'admin.user.create');
                    }
                }

                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAnyAccess(['admin.role.index', 'admin.role.create']) ) {
                    $role = $menu->add(lmcTrans('laravel-user-module/admin.menu.role.root'), 'javascript:;')
                        ->attribute('data-icon', 'icon-users')
                        ->attribute('active', 'admin.role');
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.role.index') ) {
                        $role->add(lmcTrans('laravel-user-module/admin.menu.role.all'), ['route' => 'admin.role.index'])
                            ->attribute('data-icon', 'icon-list')
                            ->attribute('active', 'admin.role.index');
                    }
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.role.create') ) {
                        $role->add(lmcTrans('laravel-user-module/admin.menu.role.add'), ['route' => 'admin.role.create'])
                            ->attribute('data-icon', 'icon-plus')
                            ->attribute('active', 'admin.role.create');
                    }
                }
                }

            // laravel page module | Page Category & Page
            if ( ! is_null(app()->getProvider(config('laravel-modules-core.packages.laravel-page-module')))) {

                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAnyAccess(['admin.page_category.index', 'admin.page_category.create']) ) {
                    $user = $menu->add(lmcTrans('laravel-page-module/admin.menu.page_category.root'), 'javascript:;')
                        ->attribute('data-icon', 'icon-doc')
                        ->attribute('active', 'admin.page_category');
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page_category.index') ) {
                        $user->add(lmcTrans('laravel-page-module/admin.menu.page_category.all'), ['route' => 'admin.page_category.index'])
                            ->attribute('data-icon', 'icon-list')
                            ->attribute('active', 'admin.page_category.index');
                    }
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page_category.create') ) {
                        $user->add(lmcTrans('laravel-page-module/admin.menu.page_category.add'), ['route' => 'admin.page_category.create'])
                            ->attribute('data-icon', 'icon-plus')
                            ->attribute('active', 'admin.page_category.create');
                    }
                }

                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAnyAccess(['admin.page.index', 'admin.page.create']) ) {
                    $role = $menu->add(lmcTrans('laravel-page-module/admin.menu.page.root'), 'javascript:;')
                        ->attribute('data-icon', 'icon-doc')
                        ->attribute('active', 'admin.page.');
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page.index') ) {
                        $role->add(lmcTrans('laravel-page-module/admin.menu.page.all'), ['route' => 'admin.page.index'])
                            ->attribute('data-icon', 'icon-list')
                            ->attribute('active', 'admin.page.index');
                    }
                    if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page.create') ) {
                        $role->add(lmcTrans('laravel-page-module/admin.menu.page.add'), ['route' => 'admin.page.create'])
                            ->attribute('data-icon', 'icon-plus')
                            ->attribute('active', 'admin.page.create');
                    }
                }
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
