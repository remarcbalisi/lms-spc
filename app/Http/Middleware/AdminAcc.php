<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AdminAcc
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
        if(!Auth::user()->is('admin')){
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
