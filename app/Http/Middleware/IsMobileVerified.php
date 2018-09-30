<?php

namespace App\Http\Middleware;

use Closure;

class IsMobileVerified
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
        return $next($request);
        if (\Auth::check() && \Auth::user()->confirmed == 1) {
            return $next($request);
        } else {
            return response()->json(
                [
                    'status_code' => 402,
                    'message' => 'Please verify your mobile number',
                    'success' => false,
                    'message_title' => 'Error'
                ]
            );
        }
    }
}
