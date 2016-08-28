<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class UserMenu
{
    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // rol ekle
        $menu->add(
            lmcTrans('laravel-user-module/admin.menu.role.add'),
            ['route' => 'admin.role.create']
        )
            ->attribute( 'data-icon', config('laravel-user-module.icons.role') )
            ->data( 'permissions', 'admin.role.create' )
            ->active( removeDomain(route('admin.role.create')) );
        // yönetici ekle
        $menu->add(
            lmcTrans('laravel-user-module/admin.menu.user.add'),
            ['route' => 'admin.user.create']
        )
            ->attribute( 'data-icon', 'icon-user-follow' )
            ->data( 'permissions', 'admin.user.create' )
            ->active( removeDomain(route('admin.user.create')) );
    }
}
