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
     * @param integer|null $count
     * @return string
     */
    function lmcTrans($id, $parameters = [], $count = null)
    {
        if (is_integer($count)) {
            return trans_choice('laravel-modules-core::'.$id, $count, $parameters);
        }
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

        $ops = Form::open(['method' => 'DELETE', 'url' => lmbRoute("admin.{$routeName}.destroy", $routeParams), 'style' => 'margin:0', 'id' => "destroy_form_{$model->id}"]);

        // edit buton
        if ( $currentPage !== 'edit' ) {
            if ( Sentinel::getUser()->is_super_admin || ($routeName === 'user' && $model->id === Sentinel::getUser()->id) || Sentinel::hasAccess("admin.{$routeName}.edit") ) {
                $ops .= '<a href="' . lmbRoute("admin.{$routeName}.edit", $routeParams) . '" class="btn btn-sm btn-outline yellow margin-right-10">';
                $ops .= '<i class="fa fa-pencil"></i>';
                $ops .= '<span class="hidden-xs">';
                $ops .= trans('laravel-modules-core::admin.ops.edit');
                $ops .= '</span>';
                $ops .= '</a>';
            }
        }

        // show buton
        if ( $currentPage !== 'show' ) {
            if ( Sentinel::getUser()->is_super_admin || ($routeName === 'user' && $model->id === Sentinel::getUser()->id) || Sentinel::hasAccess("admin.{$routeName}.show") ) {
                $ops .= '<a href="' . lmbRoute("admin.{$routeName}.show", $routeParams) . '" class="btn btn-sm btn-outline green margin-right-10">';
                $ops .= '<i class="fa fa-search"></i>';
                $ops .= '<span class="hidden-xs">';
                $ops .= trans('laravel-modules-core::admin.ops.show');
                $ops .= '</span>';
                $ops .= '</a>';
            }
        }

        // silme butonu
        if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$routeName}.destroy") ) {
            if ( $routeName !== 'user' || $model->id !== Sentinel::getUser()->id ) {
                $ops .= '<button type="submit" onclick="bootbox.confirm( \'' . trans('laravel-modules-core::admin.ops.destroy_confirmation') . '\', function(r){if(r) $(\'#destroy_form_' . $model->id . '\').submit();}); return false;" class="btn btn-sm red btn-outline margin-right-10">';
                $ops .= '<i class="fa fa-trash"></i>';
                $ops .= '<span class="hidden-xs">';
                $ops .= trans('laravel-modules-core::admin.ops.destroy');
                $ops .= '</span>';
                $ops .= '</button>';
            }
        }

        // yayınlama veya yayından kaldırma butonu
        if ( $isPublishable ) {
            // yayından kaldırma
            if ($model->is_publish) {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$routeName}.notPublish") ) {
                    $ops .= '<a href="' . lmbRoute("admin.{$routeName}.notPublish", $routeParams) . '" class="btn btn-sm btn-outline purple margin-right-10">';
                    $ops .= '<i class="fa fa-times"></i>';
                    $ops .= '<span class="hidden-xs">';
                    $ops .= trans('laravel-modules-core::admin.ops.not_publish');
                    $ops .= '</span>';
                    $ops .= '</a>';
                }
            }
            // yayınlama
            else {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$routeName}.notPublish") ) {
                    $ops .= '<a href="' . lmbRoute("admin.{$routeName}.publish", $routeParams) . '" class="btn btn-sm btn-outline blue margin-right-10">';
                    $ops .= '<i class="fa fa-bullhorn"></i>';
                    $ops .= '<span class="hidden-xs">';
                    $ops .= trans('laravel-modules-core::admin.ops.publish');
                    $ops .= '</span>';
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
     * @return mixed
     */
    function sidebarDetect($elements, $isChildren = false)
    {
        $sidebar = $isChildren ? '<ul class="sub-menu">' : '';
        foreach($elements as $element) {

            if (! is_null($element->attribute('is-header')) && $element->attribute('is-header')) {
                $sidebar .= '<li class="heading">';
                $sidebar .= "<h3 class='uppercase'>{$element->title}</h3>";
                $sidebar .= '</li>';
                continue;
            }

            // menu item
            $active = $element->isActive() ? ' active' : '';
            $open = $active && $element->hasChildren() ? ' open' : '';
            $sidebar .= "<li class='nav-item{$active}{$open}'>";

            // menu a link
            $sidebar .= '<a href="' . $element->url() . '" class="nav-link';
            $sidebar .= $element->hasChildren() ? ' nav-toogle">' : '">';
            $sidebar .= '<i class="' . $element->attribute('data-icon') . '"></i>';
            $sidebar .= ' <span class="title">' . $element->title . '</span> ';
            $sidebar .= $element->hasChildren() ? '<span class="arrow"></span>' : '';
            $sidebar .= '</a>';

            if ($element->hasChildren()) {
                $sidebar .= sidebarDetect($element->children(), true);
            }

            $sidebar .= '</li>';

        }
        return $isChildren ? $sidebar . '</ul>' : $sidebar;
    }
}



/*
|--------------------------------------------------------------------------
| remove domain on url
|--------------------------------------------------------------------------
*/
if (! function_exists('removeDomain')) {
    /**
     * @param string $url
     * @return string
     */
    function removeDomain($url)
    {
        return str_replace( url() . '/', '', $url );
    }
}



/*
|--------------------------------------------------------------------------
| get progress bar
|--------------------------------------------------------------------------
*/
if (! function_exists('getProgressBar')) {
    /**
     * @param integer $min
     * @param integer $max
     * @param integer $value
     * @param string|null $text
     * @return string
     */
    function getProgressBar($min, $max, $value, $text=null)
    {
        $percent = getPercent($max, $value);
        $color = getPercentColor( $percent );
        $bar  = '<div class="progress" style="text-indent:0; height: 20px; margin-bottom: 0;">';
        $bar .=     "<div class='progress-bar {$color}' role='progressbar' aria-valuenow='{$value}' aria-valuemin='{$min}' aria-valuemax='{$max}' style='width: {$percent}%;'>";
        $bar .=         is_null($text) ? $value : $text;
        $bar .=     '</div>';
        $bar .= '</div>';

        return $bar;
    }
}



/*
|--------------------------------------------------------------------------
| get percent color
|--------------------------------------------------------------------------
*/
if (! function_exists('getPercentColor')) {
    /**
     * @param float $value
     * @return string
     */
    function getPercentColor($value)
    {
        if ($value >= 70) {
            return 'green';
        }
        if ($value >= 40) {
            return 'yellow';
        }
        return 'red';
    }
}



/*
|--------------------------------------------------------------------------
| get link
|--------------------------------------------------------------------------
*/
if (! function_exists('lmcLink')) {
    /**
     * @param  string  $url
     * @param  string  $title
     * @param  array   $attributes
     * @return string
     */
    function lmcLink($url, $title = null, $attributes = [])
    {
        $localDomain = url();
        $parseUrl = parse_url($url);
        $urlDomain = "{$parseUrl['scheme']}://{$parseUrl['host']}";
        if (isset($parseUrl['scheme']) && isset($parseUrl['host']) && $localDomain != $urlDomain) {
            $attributes['target'] = '_blank';
        }
        return Html::link($url, $title, $attributes);
    }
}