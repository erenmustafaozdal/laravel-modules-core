<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class MenuMenu
{
    /**
     * menu permissions
     *
     * @var array
     */
    private static $menuPermissions = [
        'admin.menu.index',
        'admin.menu.create',
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(lmcTrans('laravel-menu-module/admin.menus.menu.root'), 'javascript:;')
            ->attribute('is-header',true);

        // menu
        $menuM = $menu->add(lmcTrans('laravel-menu-module/admin.menus.menu.root'), [ 'route' => ['admin.menu.index'] ])
            ->attribute( 'data-icon', config('laravel-menu-module.icons.menu') )
            ->data( 'permissions', self::$menuPermissions )
            ->active( removeDomain(lmbRoute('admin.menu.index')));
        $menuM->add(lmcTrans('laravel-menu-module/admin.menus.menu.all'), [ 'route' => ['admin.menu.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$menuPermissions[0] )
            ->active( removeDomain(lmbRoute('admin.menu.index')) );
        $menuM->add(lmcTrans('laravel-menu-module/admin.menus.menu.add'), [ 'route' => ['admin.menu.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$menuPermissions[1] )
            ->active( removeDomain(lmbRoute('admin.menu.create')) );
    }
}
