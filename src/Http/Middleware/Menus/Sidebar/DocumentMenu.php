<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class DocumentMenu
{
    /**
     * document category permissions
     *
     * @var array
     */
    private static $documentCategoryPermissions = [
        'admin.document_category.index',
        'admin.document_category.create'
    ];

    /**
     * document permissions
     *
     * @var array
     */
    private static $documentPermissions = [
        'admin.document.index',
        'admin.document.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // document_category
        $document_category = $menu->add(lmcTrans('laravel-document-module/admin.menu.document_category.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-document-module.icons.document_category') )
            ->data( 'permissions', self::$documentCategoryPermissions )
            ->active( removeDomain(route('admin.document_category.index')) . '/*');
        $document_category->add(lmcTrans('laravel-document-module/admin.menu.document_category.all'), [ 'route' => ['admin.document_category.index'] ])
            ->attribute( 'data-icon', config('laravel-document-module.icons.document_category') )
            ->data( 'permissions', self::$documentCategoryPermissions[0] )
            ->active( removeDomain(route('admin.document_category.index')) );
        $document_category->add(lmcTrans('laravel-document-module/admin.menu.document_category.add'), [ 'route' => ['admin.document_category.create'] ])
            ->attribute( 'data-icon', config('laravel-document-module.icons.document_category') )
            ->data( 'permissions', self::$documentCategoryPermissions[1] )
            ->active( removeDomain(route('admin.document_category.create')) );

        // document
        $document = $menu->add(lmcTrans('laravel-document-module/admin.menu.document.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-document-module.icons.document') )
            ->data( 'permissions', self::$documentPermissions )
            ->active( removeDomain(route('admin.document.index')) . '/*');
        $document->add(lmcTrans('laravel-document-module/admin.menu.document.all'), [ 'route' => ['admin.document.index'] ])
            ->attribute( 'data-icon', config('laravel-document-module.icons.document') )
            ->data( 'permissions', self::$documentPermissions[0] )
            ->active( removeDomain(route('admin.document.index')) );
        $document->add(lmcTrans('laravel-document-module/admin.menu.document.add'), [ 'route' => ['admin.document.create'] ])
            ->attribute( 'data-icon', config('laravel-document-module.icons.document') )
            ->data( 'permissions', self::$documentPermissions[1] )
            ->active( removeDomain(route('admin.document.create')) );
    }
}
