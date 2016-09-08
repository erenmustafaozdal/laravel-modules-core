<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class PageMenu
{
    /**
     * page category permissions
     *
     * @var array
     */
    private static $pageCategoryPermissions = [
        'admin.page_category.index',
        'admin.page_category.create'
    ];

    /**
     * page permissions
     *
     * @var array
     */
    private static $pagePermissions = [
        'admin.page.index',
        'admin.page.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(lmcTrans('laravel-page-module/admin.menu.page.root'), 'javascript:;')
            ->attribute('is-header',true);
        // page_category
        $page_category = $menu->add(lmcTrans('laravel-page-module/admin.menu.page_category.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-page-module.icons.page_category') )
            ->data( 'permissions', self::$pageCategoryPermissions )
            ->active( removeDomain(route('admin.page_category.index')) . '/*');
        $page_category->add(lmcTrans('laravel-page-module/admin.menu.page_category.all'), [ 'route' => ['admin.page_category.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$pageCategoryPermissions[0] )
            ->active( removeDomain(route('admin.page_category.index')) );
        $page_category->add(lmcTrans('laravel-page-module/admin.menu.page_category.add'), [ 'route' => ['admin.page_category.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$pageCategoryPermissions[1] )
            ->active( removeDomain(route('admin.page_category.create')) );

        // page
        $page = $menu->add(lmcTrans('laravel-page-module/admin.menu.page.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-page-module.icons.page') )
            ->data( 'permissions', self::$pagePermissions )
            ->active( removeDomain(route('admin.page.index')) . '/*');
        $page->add(lmcTrans('laravel-page-module/admin.menu.page.all'), [ 'route' => ['admin.page.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$pagePermissions[0] )
            ->active( removeDomain(route('admin.page.index')) );
        $page->add(lmcTrans('laravel-page-module/admin.menu.page.add'), [ 'route' => ['admin.page.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$pagePermissions[1] )
            ->active( removeDomain(route('admin.page.create')) );
    }
}
