<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar;


class ProductMenu
{
    /**
     * product category permissions
     *
     * @var array
     */
    private static $productCategoryPermissions = [
        'admin.product_category.index',
        'admin.product_category.create'
    ];

    /**
     * product brand permissions
     *
     * @var array
     */
    private static $productBrandPermissions = [
        'admin.product_brand.index',
        'admin.product_brand.create'
    ];

    /**
     * product showcase permissions
     *
     * @var array
     */
    private static $productShowcasePermissions = [
        'admin.product_showcase.index',
        'admin.product_showcase.create'
    ];

    /**
     * product permissions
     *
     * @var array
     */
    private static $productPermissions = [
        'admin.product.index',
        'admin.product.create'
    ];

    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        $menu->add(lmcTrans('laravel-product-module/admin.menu.product.root'), 'javascript:;')
            ->attribute('is-header',true);

        // product_category
        $product_category = $menu->add(lmcTrans('laravel-product-module/admin.menu.product_category.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-product-module.icons.product_category') )
            ->data( 'permissions', self::$productCategoryPermissions )
            ->active( removeDomain(lmbRoute('admin.product_category.index')) . '/*');
        $product_category->add(lmcTrans('laravel-product-module/admin.menu.product_category.all'), [ 'route' => ['admin.product_category.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$productCategoryPermissions[0] )
            ->active( removeDomain(lmbRoute('admin.product_category.index')) );
        $product_category->add(lmcTrans('laravel-product-module/admin.menu.product_category.add'), [ 'route' => ['admin.product_category.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$productCategoryPermissions[1] )
            ->active( removeDomain(lmbRoute('admin.product_category.create')) );

        // product_brand
        $product_brand = $menu->add(lmcTrans('laravel-product-module/admin.menu.product_brand.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-product-module.icons.product_brand') )
            ->data( 'permissions', self::$productBrandPermissions )
            ->active( removeDomain(lmbRoute('admin.product_brand.index')) . '/*');
        $product_brand->add(lmcTrans('laravel-product-module/admin.menu.product_brand.all'), [ 'route' => ['admin.product_brand.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$productBrandPermissions[0] )
            ->active( removeDomain(lmbRoute('admin.product_brand.index')) );
        $product_brand->add(lmcTrans('laravel-product-module/admin.menu.product_brand.add'), [ 'route' => ['admin.product_brand.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$productBrandPermissions[1] )
            ->active( removeDomain(lmbRoute('admin.product_brand.create')) );

        // product_showcase
        $product_showcase = $menu->add(lmcTrans('laravel-product-module/admin.menu.product_showcase.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-product-module.icons.product_showcase') )
            ->data( 'permissions', self::$productShowcasePermissions )
            ->active( removeDomain(lmbRoute('admin.product_showcase.index')) . '/*');
        $product_showcase->add(lmcTrans('laravel-product-module/admin.menu.product_showcase.all'), [ 'route' => ['admin.product_showcase.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$productShowcasePermissions[0] )
            ->active( removeDomain(lmbRoute('admin.product_showcase.index')) );
        $product_showcase->add(lmcTrans('laravel-product-module/admin.menu.product_showcase.add'), [ 'route' => ['admin.product_showcase.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$productShowcasePermissions[1] )
            ->active( removeDomain(lmbRoute('admin.product_showcase.create')) );

        // product
        $product = $menu->add(lmcTrans('laravel-product-module/admin.menu.product.root'), 'javascript:;')
            ->attribute( 'data-icon', config('laravel-product-module.icons.product') )
            ->data( 'permissions', self::$productPermissions )
            ->active( removeDomain(lmbRoute('admin.product.index')) . '/*');
        $product->add(lmcTrans('laravel-product-module/admin.menu.product.all'), [ 'route' => ['admin.product.index'] ])
            ->attribute( 'data-icon', 'icon-list' )
            ->data( 'permissions', self::$productPermissions[0] )
            ->active( removeDomain(lmbRoute('admin.product.index')) );
        $product->add(lmcTrans('laravel-product-module/admin.menu.product.add'), [ 'route' => ['admin.product.create'] ])
            ->attribute( 'data-icon', 'icon-plus' )
            ->data( 'permissions', self::$productPermissions[1] )
            ->active( removeDomain(lmbRoute('admin.product.create')) );
    }
}
