<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class UserMenu
{
    /**
     * role permissions
     *
     * @var array
     */
    private static $rolePermissions = [
        'admin.role.index',
        'admin.role.create'
    ];

    /**
     * user permissions
     *
     * @var array
     */
    private static $userPermissions = [
        'admin.user.index',
        'admin.user.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // role
        $role = $menu->add(lmcTrans('laravel-user-module/admin.menu.role.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-user-module.icons.role') )
            ->data( 'permissions', self::$rolePermissions )
            ->active( removeDomain(route('admin.role.index')) . '/*');
        $role->add(lmcTrans('laravel-user-module/admin.menu.role.all'), [ 'route' => ['admin.role.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$rolePermissions[0] )
            ->active( removeDomain(route('admin.role.index')) );
        $role->add(lmcTrans('laravel-user-module/admin.menu.role.add'), [ 'route' => ['admin.role.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$rolePermissions[1] )
            ->active( removeDomain(route('admin.role.create')) );

        // user
        $user = $menu->add(lmcTrans('laravel-user-module/admin.menu.user.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-user-module.icons.user') )
            ->data( 'permissions', self::$userPermissions )
            ->active( removeDomain(route('admin.user.index')) . '/*');
        $user->add(lmcTrans('laravel-user-module/admin.menu.user.all'), [ 'route' => ['admin.user.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$userPermissions[0] )
            ->active( removeDomain(route('admin.user.index')) );
        $user->add(lmcTrans('laravel-user-module/admin.menu.user.add'), [ 'route' => ['admin.user.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$userPermissions[1] )
            ->active( removeDomain(route('admin.user.create')) );
    }
}
