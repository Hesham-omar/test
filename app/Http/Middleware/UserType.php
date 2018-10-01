<?php

namespace App\Http\Middleware;

use Closure;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null) {
        if( auth()->check() && $role == $request->user()->type)
            return $next($request);
        else
            return redirect('login');
    }
}
