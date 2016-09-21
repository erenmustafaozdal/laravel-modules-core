<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class ContactMenu
{
    /**
     * contact permissions
     *
     * @var array
     */
    private static $contactPermissions = [
        'admin.contact.index',
        'admin.contact.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(lmcTrans('laravel-contact-module/admin.menu.contact.root'), 'javascript:;')
            ->attribute('is-header',true);

        // contact
        $contact = $menu->add(lmcTrans('laravel-contact-module/admin.menu.contact.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-contact-module.icons.contact') )
            ->data( 'permissions', self::$contactPermissions )
            ->active( removeDomain(lmbRoute('admin.contact.index')) . '/*');
        $contact->add(lmcTrans('laravel-contact-module/admin.menu.contact.all'), [ 'route' => ['admin.contact.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$contactPermissions[0] )
            ->active( removeDomain(lmbRoute('admin.contact.index')) );
        $contact->add(lmcTrans('laravel-contact-module/admin.menu.contact.add'), [ 'route' => ['admin.contact.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$contactPermissions[1] )
            ->active( removeDomain(lmbRoute('admin.contact.create')) );
    }
}
