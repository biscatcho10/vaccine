<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // set laravel localization
        if(\Session::has('locale')){
           \App::setlocale(\Session::get('locale'));
        }
        return $next($request);
    }
}
