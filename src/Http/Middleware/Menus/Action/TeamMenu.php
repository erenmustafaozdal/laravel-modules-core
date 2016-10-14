<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class TeamMenu
{
    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // departman ekle
        $menu->add(
            lmcTrans('laravel-team-module/admin.menu.team_category.add'),
            [ 'route' => [ 'admin.team_category.create'] ]
        )
            ->attribute( 'data-icon', 'icon-users' )
            ->data( 'permissions', 'admin.team_category.create' )
            ->active( lmbRoute( 'admin.team_category.create' ) );

        // ekip ekle
        $menu->add(
            lmcTrans('laravel-team-module/admin.menu.team.add'),
            [ 'route' => [ 'admin.team.create'] ]
        )
            ->attribute( 'data-icon', 'icon-user' )
            ->data( 'permissions', 'admin.team.create' )
            ->active( lmbRoute( 'admin.team.create' ) );
    }
}
