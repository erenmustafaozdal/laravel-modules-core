<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class ContactMenu
{
    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // şube ekle
        $menu->add(
            lmcTrans('laravel-contact-module/admin.menu.contact.add'),
            ['route' => 'admin.contact.create']
        )
            ->attribute( 'data-icon', config('laravel-contact-module.icons.contact') )
            ->data( 'permissions', 'admin.contact.create' )
            ->active( removeDomain(lmbRoute('admin.contact.create')) );
    }
}
