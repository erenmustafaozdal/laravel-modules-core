<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\User;

use Sentinel;

class AccountMenu
{
    /**
     * user permissions
     *
     * @var array
     */
    private static $userPermissions = [
        'admin.user.show'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(
            lmcTrans('admin.profile'),
            ['route' => ['admin.user.show', 'id' => Sentinel::getUser()->id]]
        )
            ->attribute( 'data-icon', config('laravel-user-module.icons.user') )
            ->data( 'permissions', self::$userPermissions )
            ->active( removeDomain(lmbRoute('admin.user.show', ['id' => Sentinel::getUser()->id])) . '/*' );
        $menu->add( lmcTrans('admin.logout'), ['route' => 'getLogout'] )
            ->attribute( 'data-icon', 'icon-logout' );
    }
}
