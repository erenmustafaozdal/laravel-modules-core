<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Services;

use Route;
use Sentinel;

class BreadcrumbService
{
    /**
     * module name
     *
     * @var     string
     */
    private $module_name;

    /**
     * route name
     *
     * @var     string
     */
    private $route_name;

    /**
     * index route name
     *
     * @var     string
     */
    private $index_route_name;

    /**
     * construct method
     */
    public function __construct()
    {
        $route_action = Route::currentRouteAction();
        $this->module_name = $this->getModule($route_action);
        $this->route_name = Route::currentRouteName();
        $this->index_route_name = substr($this->route_name, 0, strrpos($this->route_name, '.') + 1) . 'index';
    }

    /**
     * get module name from route action
     *
     * @param       string      $action
     * @return       string
     */
    public function getModule($action)
    {
        $path_args = explode('\\', $action);
        $module = snake_case($path_args[1]);
        return 'laravel-modules-core::'.str_replace('_','-',$module).'/';
    }

    /**
     * get theme breadcrumb
     *
     * @param \Illuminate\Support\Collection|null $model
     * @param string|null $column
     * @return  string
     */
    public function getBreadcrumb($model = null, $column = null)
    {
        $modelTrans = is_null($model) ? [] : [ snake_case( substr( strrchr( get_class($model), '\\' ), 1 ) ) => $model->$column ];
        $modelRoute = is_null($model) ? [] : [ 'id' => $model->id ];

        $breadcrumbs  = '<ul class="page-breadcrumb breadcrumb">';
        // admin dashboard
        if ( ! is_null(app()->getProvider(config('laravel-modules-core.packages.laravel-dashboard-module')))) {
            $breadcrumbs .= $this->getDashboardBreadcrumb();
        }
        // if admin dashboard index return
        if(strpos($this->route_name, 'dashboard')  !== false) {
            $breadcrumbs  .= '</ul>';
            return $breadcrumbs;
        }

        $breadcrumbs  .= '<li>';
        $parent_text   = strpos($this->route_name, 'index')  !== false ?
            trans($this->module_name.$this->route_name, $modelTrans) :
            trans($this->module_name.$this->index_route_name, $modelTrans);

        if ( strpos($this->route_name, 'index')  !== false ) {
            $breadcrumbs  .= $parent_text;
        } else {
            $route = Sentinel::getUser()->is_super_admin || Sentinel::hasAccess($this->index_route_name) ? route($this->index_route_name, $modelRoute) : 'javascript:;';
            $breadcrumbs  .= '<a href="'. $route .'">'.$parent_text.'</a><i class="fa fa-circle"></i>';
        }

        $breadcrumbs  .= '</li>';

        if (strpos($this->route_name, 'index')  === false) {
            $breadcrumbs  .= '<li> <span class="active"> '.trans($this->module_name.$this->route_name, $modelTrans).'</span> </li>';
        }

        $breadcrumbs .= '</ul>';
        return $breadcrumbs;
    }

    /**
     * get dashboard breadcrumb
     *
     * @return string
     */
    public function getDashboardBreadcrumb()
    {
        if ( ! Sentinel::getUser()->is_super_admin && ! Sentinel::hasAccess('admin.dashboard.index') ) {
            return '';
        }
        $breadcrumbs  = '<li>';
        $breadcrumbs .= '<a href="'.route('admin.dashboard.index').'">';
        $breadcrumbs .= trans('laravel-modules-core::laravel-dashboard-module/admin.dashboard.index');
        $breadcrumbs .= '</a>';
        $breadcrumbs .= '<i class="fa fa-circle"></i>';
        $breadcrumbs .= '</li>';
        return $breadcrumbs;
    }
}