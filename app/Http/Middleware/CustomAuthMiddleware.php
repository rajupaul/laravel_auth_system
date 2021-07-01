<?php

namespace App\Http\Middleware;

use Closure;

class CustomAuthMiddleware
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
    
        if(!auth()->check()){
            return redirect()->route('getLogin')->with('error','You must be authenticated to access this page');
        }
        return $next($request);
    }
}
