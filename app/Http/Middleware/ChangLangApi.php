<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangLangApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        app()->setLocale($request->header('lang_api' , 'ar'));
        return $next($request);
    }
}
