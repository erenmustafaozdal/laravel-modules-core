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
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\PageMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\DocumentMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Action\DescriptionMenu::class,
    ];

    /**
     * sidebar menu classes
     *
     * @var array
     */
    protected $sidebarMenus = [
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\UserMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\PageMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\DocumentMenu::class,
        \ErenMustafaOzdal\LaravelModulesCore\Http\Middleware\Menus\Sidebar\DescriptionMenu::class,
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
            //$this->topbarUserLoginMenu();
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
            $access = is_array($item->data('permissions'))
                ? Sentinel::hasAnyAccess($item->data('permissions'))
                : Sentinel::hasAccess($item->data('permissions'));
            return $this->user->is_super_admin || $access ?: false;
        });

    }
}
