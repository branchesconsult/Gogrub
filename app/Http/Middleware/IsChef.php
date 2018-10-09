<?php

namespace App\Http\Middleware;

use Closure;

class IsChef
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return access()->hasRole('Chef') ? $next($request) : apiErrorRes(401, 'You are not chef');
    }
}
