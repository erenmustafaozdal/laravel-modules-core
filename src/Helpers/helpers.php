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
     * @param $model
     * @param string $currentPage
     * @param boolean $isPublishable
     * @return string
     */
    function getOps($model, $currentPage, $isPublishable = false)
    {
        $route_name = snake_case(class_basename($model));
        $ops = Form::open(['method' => 'DELETE', 'url' => route("admin.{$route_name}.destroy", ['id' => $model->id]), 'style' => 'margin:0', 'id' => "destroy_form_{$model->id}"]);

        // edit buton
        if ( $currentPage !== 'edit' ) {
            if ( Sentinel::getUser()->is_super_admin || ($route_name === 'user' && $model->id === Sentinel::getUser()->id) || Sentinel::hasAccess("admin.{$route_name}.edit") ) {
                $ops .= '<a href="' . route("admin.{$route_name}.edit", ['id' => $model->id]) . '" class="btn btn-sm btn-outline yellow margin-right-10">';
                $ops .= '<i class="fa fa-pencil"></i>';
                $ops .= trans('laravel-modules-core::admin.ops.edit');
                $ops .= '</a>';
            }
        }

        // show buton
        if ( $currentPage !== 'show' ) {
            if ( Sentinel::getUser()->is_super_admin || ($route_name === 'user' && $model->id === Sentinel::getUser()->id) || Sentinel::hasAccess("admin.{$route_name}.show") ) {
                $ops .= '<a href="' . route("admin.{$route_name}.show", ['id' => $model->id]) . '" class="btn btn-sm btn-outline green margin-right-10">';
                $ops .= '<i class="fa fa-search"></i>';
                $ops .= trans('laravel-modules-core::admin.ops.show');
                $ops .= '</a>';
            }
        }

        // silme butonu
        if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$route_name}.destroy") ) {
            if ( $route_name !== 'user' || $model->id !== Sentinel::getUser()->id ) {
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
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$route_name}.notPublish") ) {
                    $ops .= '<a href="' . route("admin.{$route_name}.notPublish", ['id' => $model->id]) . '" class="btn btn-sm btn-outline purple margin-right-10">';
                    $ops .= '<i class="fa fa-times"></i>';
                    $ops .= trans('laravel-modules-core::admin.ops.not_publish');
                    $ops .= '</a>';
                }
            }
            // yayınlama
            else {
                if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.{$route_name}.notPublish") ) {
                    $ops .= '<a href="' . route("admin.{$route_name}.notPublish", ['id' => $model->id]) . '" class="btn btn-sm btn-outline blue margin-right-10">';
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