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
     * @param  string  $id
     * @return string
     */
    function lmcTrans($id)
    {
        return trans('laravel-modules-core::'.$id);
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
     * @return string
     */
    function getOps($model)
    {
        $route_name = snake_case(class_basename($model));


        $ops  = Form::open(['method' => 'DELETE', 'url' => route("admin.{$route_name}.destroy", ['id' => $model->id]), 'style' => 'margin:0', 'id' => "destroy_form_{$model->id}"]);

        // düzenleme butoun
        $ops .= '<a href="' . route("admin.{$route_name}.edit", ['id' => $model->id]) . '" class="btn btn-sm btn-outline yellow margin-right-10">';
        $ops .= '<i class="fa fa-pencil"></i>';
        $ops .= trans('laravel-modules-core::admin.ops.edit');
        $ops .= '</a>';

        // silme butonu
        $ops .= '<button type="submit" onclick="bootbox.confirm( \'' . trans('laravel-modules-core::admin.ops.destroy_confirmation') . '\', function(r){if(r) $(\'#destroy_form_' . $model->id . '\').submit();}); return false;" class="btn btn-sm red btn-outline">';
        $ops .= '<i class="fa fa-trash"></i>';
        $ops .= trans('laravel-modules-core::admin.ops.destroy');
        $ops .= '</button>';

        $ops .= Form::close();
        return $ops;
    }
}