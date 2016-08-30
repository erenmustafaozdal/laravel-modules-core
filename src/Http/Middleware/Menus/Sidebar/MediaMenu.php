<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class MediaMenu
{
    /**
     * media category permissions
     *
     * @var array
     */
    private static $mediaCategoryPermissions = [
        'admin.media_category.index',
        'admin.media_category.create'
    ];

    /**
     * media permissions
     *
     * @var array
     */
    private static $mediaPermissions = [
        'admin.media.index',
        'admin.media.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // media_category
        $media_category = $menu->add(lmcTrans('laravel-media-module/admin.menu.media_category.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-media-module.icons.media_category') )
            ->data( 'permissions', self::$mediaCategoryPermissions )
            ->active( removeDomain(route('admin.media_category.index')) . '/*');
        $media_category->add(lmcTrans('laravel-media-module/admin.menu.media_category.all'), [ 'route' => ['admin.media_category.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$mediaCategoryPermissions[0] )
            ->active( removeDomain(route('admin.media_category.index')) );
        $media_category->add(lmcTrans('laravel-media-module/admin.menu.media_category.add'), [ 'route' => ['admin.media_category.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$mediaCategoryPermissions[1] )
            ->active( removeDomain(route('admin.media_category.create')) );

        // media
        $media = $menu->add(lmcTrans('laravel-media-module/admin.menu.media.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-media-module.icons.media') )
            ->data( 'permissions', self::$mediaPermissions )
            ->active( removeDomain(route('admin.media.index')) . '/*');
        $media->add(lmcTrans('laravel-media-module/admin.menu.media.all'), [ 'route' => ['admin.media.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$mediaPermissions[0] )
            ->active( removeDomain(route('admin.media.index')) );
        $media->add(lmcTrans('laravel-media-module/admin.menu.media.add'), [ 'route' => ['admin.media.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$mediaPermissions[1] )
            ->active( removeDomain(route('admin.media.create')) );
    }
}
