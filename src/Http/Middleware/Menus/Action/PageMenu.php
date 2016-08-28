<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class PageMenu
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
            lmcTrans('laravel-page-module/admin.menu.page_category.add'),
            ['route' => 'admin.page_category.create']
        )
            ->attribute( 'data-icon', config('laravel-page-module.icons.page_category') )
            ->data( 'permissions', 'admin.page_category.create' )
            ->active( removeDomain(route('admin.page_category.create')) );
        // yönetici ekle
        $menu->add(
            lmcTrans('laravel-page-module/admin.menu.page.add'),
            ['route' => 'admin.page.create']
        )
            ->attribute( 'data-icon', config('laravel-page-module.icons.page') )
            ->data( 'permissions', 'admin.page.create' )
            ->active( removeDomain(route('admin.page.create')) );
    }
}
