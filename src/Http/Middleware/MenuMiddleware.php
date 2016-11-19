<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware;

use Closure;
use Caffeinated\Menus\Facades\Menu;
use Sentinel;

class MenuMiddleware
{
    /**
     * action menu classes
     *
     * @var array
     */
    protected $actionMenus = [
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\UserMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\TeamMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\PageMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\DocumentMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\DescriptionMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\MediaMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\DealerMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\ProductMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\ContactMenu::class,
    ];

    /**
     * sidebar menu classes
     *
     * @var array
     */
    protected $sidebarMenus = [
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\CompanyMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\MenuMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\UserMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\TeamMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\PageMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\DocumentMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\DescriptionMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\MediaMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\DealerMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\ProductMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\ContactMenu::class,
    ];

    /**
     * user menu classes
     *
     * @var array
     */
    protected $userMenus = [
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\User\AccountMenu::class,
    ];

    /**
     * authenticated user
     *
     * @var \Cartalyst\Sentinel\Users\EloquentUser|null
     */
    private $user;

    /**
     * menu middleware construct metod
     */
    public function __construct()
    {
        $this->user = Sentinel::getUser();
    }

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! is_null($this->user) )
        {
            $this->menuInit('action');
            $this->menuInit('sidebar');
            $this->menuInit('user');
        }
        return $next($request);
    }

    /**
     * init menus
     *
     * @param string $type
     */
    public function menuInit($type)
    {
        Menu::make($type, function($menu) use($type)
        {
            $menus = $type . 'Menus';
            foreach($this->$menus as $action) {
                $action::addMenu($menu);
            }
        })->filter(function($item)
        {
            if (is_null($item->data('permissions'))) {
                return true;
            }
            return $this->user->is_super_admin || hasPermission($item->data('permissions')) ?: false;
        });

    }
}
