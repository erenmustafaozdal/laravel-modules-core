<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class DocumentMenu
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
            lmcTrans('laravel-document-module/admin.menu.document_category.add'),
            ['route' => 'admin.document_category.create']
        )
            ->attribute( 'data-icon', config('laravel-document-module.icons.document_category') )
            ->data( 'permissions', 'admin.document_category.create' )
            ->active( removeDomain(route('admin.document_category.create')) );
        // yönetici ekle
        $menu->add(
            lmcTrans('laravel-document-module/admin.menu.document.add'),
            ['route' => 'admin.document.create']
        )
            ->attribute( 'data-icon', config('laravel-document-module.icons.document') )
            ->data( 'permissions', 'admin.document.create' )
            ->active( removeDomain(route('admin.document.create')) );
    }
}
