<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class DescriptionMenu
{
    /**
     * description category permissions
     *
     * @var array
     */
    private static $descriptionCategoryPermissions = [
        'admin.description_category.index',
        'admin.description_category.create'
    ];

    /**
     * description permissions
     *
     * @var array
     */
    private static $descriptionPermissions = [
        'admin.description.index',
        'admin.description.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(lmcTrans('laravel-description-module/admin.menu.description.root'), 'javascript:;')
            ->attribute('is-header',true);
        // description_category
        $description_category = $menu->add(lmcTrans('laravel-description-module/admin.menu.description_category.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-description-module.icons.description_category') )
            ->data( 'permissions', self::$descriptionCategoryPermissions )
            ->active( removeDomain(route('admin.description_category.index')) . '/*');
        $description_category->add(lmcTrans('laravel-description-module/admin.menu.description_category.all'), [ 'route' => ['admin.description_category.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$descriptionCategoryPermissions[0] )
            ->active( removeDomain(route('admin.description_category.index')) );
        $description_category->add(lmcTrans('laravel-description-module/admin.menu.description_category.add'), [ 'route' => ['admin.description_category.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$descriptionCategoryPermissions[1] )
            ->active( removeDomain(route('admin.description_category.create')) );

        // description
        $description = $menu->add(lmcTrans('laravel-description-module/admin.menu.description.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-description-module.icons.description') )
            ->data( 'permissions', self::$descriptionPermissions )
            ->active( removeDomain(route('admin.description.index')) . '/*');
        $description->add(lmcTrans('laravel-description-module/admin.menu.description.all'), [ 'route' => ['admin.description.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$descriptionPermissions[0] )
            ->active( removeDomain(route('admin.description.index')) );
        $description->add(lmcTrans('laravel-description-module/admin.menu.description.add'), [ 'route' => ['admin.description.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$descriptionPermissions[1] )
            ->active( removeDomain(route('admin.description.create')) );
    }
}
