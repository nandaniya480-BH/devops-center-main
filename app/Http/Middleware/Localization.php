<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('locale'))
        {
           Session::put('locale', Config::get('app.locale'));
        }
        \App::setLocale(Session::get('locale'));

        return $next($request);
    }
}
