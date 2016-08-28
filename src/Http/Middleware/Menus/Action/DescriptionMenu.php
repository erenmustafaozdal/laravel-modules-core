<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class DescriptionMenu
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
            lmcTrans('laravel-description-module/admin.menu.description_category.add'),
            ['route' => 'admin.description_category.create']
        )
            ->attribute( 'data-icon', config('laravel-description-module.icons.description_category') )
            ->data( 'permissions', 'admin.description_category.create' )
            ->active( removeDomain(route('admin.description_category.create')) );
        // yönetici ekle
        $menu->add(
            lmcTrans('laravel-description-module/admin.menu.description.add'),
            ['route' => 'admin.description.create']
        )
            ->attribute( 'data-icon', config('laravel-description-module.icons.description') )
            ->data( 'permissions', 'admin.description.create' )
            ->active( removeDomain(route('admin.description.create')) );
    }
}
