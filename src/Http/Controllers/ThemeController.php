<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ThemeController extends Controller
{
    /**
     * Abort if request is not ajax
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if(! $request->ajax()) abort(403, 'Forbidden');
    }

    /**
     * Admin Theme Change
     *
     * @param   Request         $request
     * @return  Redirector
     */
    public function getThemeChange(Request $request)
    {
        if (Cache::has('theme_tool')) {
            Cache::forget('theme_tool');
        }
        Cache::forever('theme_tool', $request->all());
        return response()->json(['result' => true]);
    }
}
