<?php
/*
|--------------------------------------------------------------------------
| laravel elixir helper hacked
|--------------------------------------------------------------------------
*/
if (! function_exists('lmcElixir')) {
    /**
     * Get the path to a versioned Elixir file.
     *
     * @param  string  $file
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    function lmcElixir($file)
    {
        static $manifest = null;

        if (is_null($manifest)) {
            $manifest = json_decode(file_get_contents(public_path('vendor/laravel-modules-core/build/rev-manifest.json')), true);
        }

        if (isset($manifest[$file])) {
            return '/vendor/laravel-modules-core/build/'.$manifest[$file];
        }

        throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
    }
}



/*
|--------------------------------------------------------------------------
| laravel trans helper hacked
|--------------------------------------------------------------------------
*/
if (! function_exists('lmcTrans')) {
    /**
     * translate given message with laravel trans function
     *
     * @param string $id
     * @param array $parameters
     * @return string
     */
    function lmcTrans($id, $parameters = [])
    {
        return trans('laravel-modules-core::'.$id, $parameters);
    }
}



/*
|--------------------------------------------------------------------------
| get operation buttons
|--------------------------------------------------------------------------
*/
if (! function_exists('getOps')) {
    /**
     * get operation buttons
     *
     * @param \Illuminate\Support\Collection $model
     * @param string $currentPage
     * @param boolean $isPublishable
     * @param \Illuminate\Support\Collection|null $relatedModel
     * @param string $modelRouteRegex
     * @return string
     */
    function getOps($model, $currentPage, $isPublishable = false, $relatedModel = null, $modelRouteRegex = '')
    {
        $routeName = snake_case(class_basename($model));
        $routeParams = ['id' => $model->id];

        if ( ! is_null($relatedModel)) {
            $routeName = snake_case(class_basename($relatedModel)) . '.' . $routeName;
            $routeParams = [
                'id'                => $relatedModel->id,
                $modelRouteRegex    => $model->id
            ];
        }

        $ops = Form::open(['method' => 'DELETE', 'url' => route("admin.{$routeName}.destroy", $routeParams), 'style' => 'margin:0', 'id' => "destroy_form_{$model->id}"]);

        // edit buton
        if ( $currentPage !== 'edit' ) {
            if ( Sentinel::getUser()->is_super_admin || ($routeName === 'user' && $model->id === Sentinel::getUser()->id) || Sentinel::hasAccess("admin.{$routeName}.edit") ) {
                $ops .= '<a href="' . route("admin.{$routeName}.edit", $routeParams) . '" class="btn btn-sm btn-outline yellow margin-right-10">';
                $ops .= '<i class="fa fa-pencil"></i>';
                $ops .= trans('laravel-modules-core::admin.ops.edit');
                $ops .= '</a>';
            }
        }

        // show buton
        if ( $currentPage !== 'show' ) {
            if ( Sentinel::getUser()->is_super_admin || ($routeName === 'user' && $model->id === Sentinel::getUser()->id) || Sentinel::hasAccess("admin.{$routeName}.show") ) {
                $ops .= '<a href="' . route("admin.{$routeName}.show", $routeParams) . '" class="btn btn-sm btn-outline green margin-right-10">';
                $ops .= '<i class="fa fa-search"></i>';
                $ops .= trans('laravel-modules-core::admin.ops.show');
                $ops .= '</a>';
            }
        }

        // silme butonu
        if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$routeName}.destroy") ) {
            if ( $routeName !== 'user' || $model->id !== Sentinel::getUser()->id ) {
                $ops .= '<button type="submit" onclick="bootbox.confirm( \'' . trans('laravel-modules-core::admin.ops.destroy_confirmation') . '\', function(r){if(r) $(\'#destroy_form_' . $model->id . '\').submit();}); return false;" class="btn btn-sm red btn-outline margin-right-10">';
                $ops .= '<i class="fa fa-trash"></i>';
                $ops .= trans('laravel-modules-core::admin.ops.destroy');
                $ops .= '</button>';
            }
        }

        // yayınlama veya yayından kaldırma butonu
        if ( $isPublishable ) {
            // yayından kaldırma
            if ($model->is_publish) {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$routeName}.notPublish") ) {
                    $ops .= '<a href="' . route("admin.{$routeName}.notPublish", $routeParams) . '" class="btn btn-sm btn-outline purple margin-right-10">';
                    $ops .= '<i class="fa fa-times"></i>';
                    $ops .= trans('laravel-modules-core::admin.ops.not_publish');
                    $ops .= '</a>';
                }
            }
            // yayınlama
            else {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$routeName}.notPublish") ) {
                    $ops .= '<a href="' . route("admin.{$routeName}.publish", $routeParams) . '" class="btn btn-sm btn-outline blue margin-right-10">';
                    $ops .= '<i class="fa fa-bullhorn"></i>';
                    $ops .= trans('laravel-modules-core::admin.ops.publish');
                    $ops .= '</a>';
                }
            }
        }

        $ops .= Form::close();
        return $ops;
    }
}



/*
|--------------------------------------------------------------------------
| sidebar detect
|--------------------------------------------------------------------------
*/
if (! function_exists('sidebarDetect')) {
    /**
     * detect the side bar menu
     *
     * @param array $elements
     * @param boolean $isChildren
     * @return Caffeinated\Menus\Menu $menu
     */
    function sidebarDetect($elements, $isChildren = false)
    {
        $sidebar = $isChildren ? '<ul class="sub-menu">' : '';
        foreach($elements as $element) {
            // menu item
            $isCurrent = strpos(Route::currentRouteName(),$element->attribute('active')) !== false;
            $sidebar .= '<li class="nav-item';
            $sidebar .=  $isCurrent && $element->hasChildren() ? ' active open">' : $isCurrent ? ' active">' : '">';
            $sidebar .= '';

            // menu a link
            $sidebar .= '<a href="'. $element->url() .'" class="nav-link';
            $sidebar .= $element->hasChildren() ? ' nav-toogle">' : '">';
            $sidebar .= '<i class="'. $element->attribute('data-icon') .'"></i>';
            $sidebar .= '<span class="title">'. $element->title .'</span>';
            $sidebar .= $element->hasChildren() ? '<span class="arrow"></span>' : '';
            $sidebar .= '</a>';

            if($element->hasChildren()) {
                $sidebar .= sidebarDetect($element->children(), true);
            }

            $sidebar .= '</li>';
        }
        return $isChildren ? $sidebar . '</ul>' : $sidebar;
    }
}