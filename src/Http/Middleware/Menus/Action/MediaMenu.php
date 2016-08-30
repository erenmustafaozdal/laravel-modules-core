<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class MediaMenu
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
            lmcTrans('laravel-media-module/admin.menu.media_category.add'),
            ['route' => 'admin.media_category.create']
        )
            ->attribute( 'data-icon', config('laravel-media-module.icons.media_category') )
            ->data( 'permissions', 'admin.media_category.create' )
            ->active( removeDomain(route('admin.media_category.create')) );
        // yönetici ekle
        $menu->add(
            lmcTrans('laravel-media-module/admin.menu.media.add'),
            ['route' => 'admin.media.create']
        )
            ->attribute( 'data-icon', config('laravel-media-module.icons.media') )
            ->data( 'permissions', 'admin.media.create' )
            ->active( removeDomain(route('admin.media.create')) );
    }
}
