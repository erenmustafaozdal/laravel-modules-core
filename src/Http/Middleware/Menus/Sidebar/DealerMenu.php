<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class DealerMenu
{
    /**
     * dealer category permissions
     *
     * @var array
     */
    private static $dealerCategoryPermissions = [
        'admin.dealer_category.index',
        'admin.dealer_category.create'
    ];

    /**
     * dealer permissions
     *
     * @var array
     */
    private static $dealerPermissions = [
        'admin.dealer.index',
        'admin.dealer.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // dealer_category
        $dealer_category = $menu->add(lmcTrans('laravel-dealer-module/admin.menu.dealer_category.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-dealer-module.icons.dealer_category') )
            ->data( 'permissions', self::$dealerCategoryPermissions )
            ->active( removeDomain(route('admin.dealer_category.index')) . '/*');
        $dealer_category->add(lmcTrans('laravel-dealer-module/admin.menu.dealer_category.all'), [ 'route' => ['admin.dealer_category.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$dealerCategoryPermissions[0] )
            ->active( removeDomain(route('admin.dealer_category.index')) );
        $dealer_category->add(lmcTrans('laravel-dealer-module/admin.menu.dealer_category.add'), [ 'route' => ['admin.dealer_category.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$dealerCategoryPermissions[1] )
            ->active( removeDomain(route('admin.dealer_category.create')) );

        // dealer
        $dealer = $menu->add(lmcTrans('laravel-dealer-module/admin.menu.dealer.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-dealer-module.icons.dealer') )
            ->data( 'permissions', self::$dealerPermissions )
            ->active( removeDomain(route('admin.dealer.index')) . '/*');
        $dealer->add(lmcTrans('laravel-dealer-module/admin.menu.dealer.all'), [ 'route' => ['admin.dealer.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$dealerPermissions[0] )
            ->active( removeDomain(route('admin.dealer.index')) );
        $dealer->add(lmcTrans('laravel-dealer-module/admin.menu.dealer.add'), [ 'route' => ['admin.dealer.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$dealerPermissions[1] )
            ->active( removeDomain(route('admin.dealer.create')) );
    }
}
