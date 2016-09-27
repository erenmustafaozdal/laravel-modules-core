<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class CompanyMenu
{
    /**
     * company permissions
     *
     * @var array
     */
    private static $companyPermissions = [
        'admin.company.edit',
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(lmcTrans('laravel-company-module/admin.menu.company.root'), 'javascript:;')
            ->attribute('is-header',true);

        // company
        $menu->add(lmcTrans('laravel-company-module/admin.menu.company.root'), [ 'route' => ['admin.company.edit'] ])
            ->attribute( 'data-icon', config('laravel-company-module.icons.company') )
            ->data( 'permissions', self::$companyPermissions )
            ->active( removeDomain(lmbRoute('admin.company.edit')));
    }
}
