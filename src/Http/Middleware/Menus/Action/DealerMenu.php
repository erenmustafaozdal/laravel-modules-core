<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class DealerMenu
{
    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // bayi kategorisi ekle
        $menu->add(
            lmcTrans('laravel-dealer-module/admin.menu.dealer_category.add'),
            ['route' => 'admin.dealer_category.create']
        )
            ->attribute( 'data-icon', config('laravel-dealer-module.icons.dealer_category') )
            ->data( 'permissions', 'admin.dealer_category.create' )
            ->active( removeDomain(lmbRoute('admin.dealer_category.create')) );
        // bayi ekle
        $menu->add(
            lmcTrans('laravel-dealer-module/admin.menu.dealer.add'),
            ['route' => 'admin.dealer.create']
        )
            ->attribute( 'data-icon', config('laravel-dealer-module.icons.dealer') )
            ->data( 'permissions', 'admin.dealer.create' )
            ->active( removeDomain(lmbRoute('admin.dealer.create')) );
    }
}
