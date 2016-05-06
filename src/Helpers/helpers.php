<?php

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