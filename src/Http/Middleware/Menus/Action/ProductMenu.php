<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action;

class ProductMenu
{
    /**
     * add menu method
     *
     * @param \Caffeinated\Menus\Menu $menu
     * @return void
     */
    public static function addMenu($menu)
    {
        // ürün kategorisi ekle
        $menu->add(
            lmcTrans('laravel-product-module/admin.menu.product_category.add'),
            ['route' => 'admin.product_category.create']
        )
            ->attribute( 'data-icon', config('laravel-product-module.icons.product_category') )
            ->data( 'permissions', 'admin.product_category.create' )
            ->active( removeDomain(route('admin.product_category.create')) );
        // marka ekle
        $menu->add(
            lmcTrans('laravel-product-module/admin.menu.product_brand.add'),
            ['route' => 'admin.product_brand.create']
        )
            ->attribute( 'data-icon', config('laravel-product-module.icons.product_brand') )
            ->data( 'permissions', 'admin.product_brand.create' )
            ->active( removeDomain(route('admin.product_brand.create')) );
        // vitrin ekle
        $menu->add(
            lmcTrans('laravel-product-module/admin.menu.product_showcase.add'),
            ['route' => 'admin.product_showcase.create']
        )
            ->attribute( 'data-icon', config('laravel-product-module.icons.product_showcase') )
            ->data( 'permissions', 'admin.product_showcase.create' )
            ->active( removeDomain(route('admin.product_showcase.create')) );
        // ürün ekle
        $menu->add(
            lmcTrans('laravel-product-module/admin.menu.product.add'),
            ['route' => 'admin.product.create']
        )
            ->attribute( 'data-icon', config('laravel-product-module.icons.product') )
            ->data( 'permissions', 'admin.product.create' )
            ->active( removeDomain(route('admin.product.create')) );
    }
}
