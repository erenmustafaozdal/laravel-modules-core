<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class TeamMenu
{
    /**
     * team category permissions
     *
     * @var array
     */
    private static $teamCategoryPermissions = [
        'admin.team_category.index',
        'admin.team_category.create'
    ];

    /**
     * team permissions
     *
     * @var array
     */
    private static $teamPermissions = [
        'admin.team.index',
        'admin.team.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(lmcTrans('laravel-team-module/admin.menu.team.root'), 'javascript:;')
            ->attribute('is-header',true);
        // team_category
        $team_category = $menu->add(lmcTrans('laravel-team-module/admin.menu.team_category.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-team-module.icons.team_category') )
            ->data( 'permissions', self::$teamCategoryPermissions )
            ->active( removeDomain(lmbRoute('admin.team_category.index')) . '/*');
        $team_category->add(lmcTrans('laravel-team-module/admin.menu.team_category.all'), [ 'route' => ['admin.team_category.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$teamCategoryPermissions[0] )
            ->active( removeDomain(lmbRoute('admin.team_category.index')) );
        $team_category->add(lmcTrans('laravel-team-module/admin.menu.team_category.add'), [ 'route' => ['admin.team_category.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$teamCategoryPermissions[1] )
            ->active( removeDomain(lmbRoute('admin.team_category.create')) );

        // team
        $team = $menu->add(lmcTrans('laravel-team-module/admin.menu.team.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-team-module.icons.team') )
            ->data( 'permissions', self::$teamPermissions )
            ->active( removeDomain(lmbRoute('admin.team.index')) . '/*');
        $team->add(lmcTrans('laravel-team-module/admin.menu.team.all'), [ 'route' => ['admin.team.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$teamPermissions[0] )
            ->active( removeDomain(lmbRoute('admin.team.index')) );
        $team->add(lmcTrans('laravel-team-module/admin.menu.team.add'), [ 'route' => ['admin.team.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$teamPermissions[1] )
            ->active( removeDomain(lmbRoute('admin.team.create')) );
    }
}
