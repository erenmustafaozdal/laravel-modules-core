<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ThemeController extends Controller
{
    /**
     * Admin Theme Layout Change
     *
     * @param   Request         $request
     * @return  \Illuminate\Http\Response
     */
    public function getThemeLayoutChange(Request $request)
    {
        if (Cache::has('theme_layout')) {
            Cache::forget('theme_layout');
        }
        Cache::forever('theme_layout', $request->all());
        return response()->json(['result' => true]);
    }

    /**
     * Admin Theme Color Change
     *
     * @param   Request         $request
     * @return  \Illuminate\Http\Response
     */
    public function getThemeColorChange(Request $request)
    {
        if (Cache::has('theme_color')) {
            Cache::forget('theme_color');
        }
        Cache::forever('theme_color', $request->all());
        return response()->json(['result' => true]);
    }
}
