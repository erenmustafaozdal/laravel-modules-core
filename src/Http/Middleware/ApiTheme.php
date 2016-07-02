<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Sentinel;

class ApiTheme
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! Sentinel::check()) {
            abort(401);
        }
        if(! $request->ajax()) {
            abort(403);
        }

        return $next($request);
    }
}
