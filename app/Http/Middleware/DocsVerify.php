<?php

namespace App\Http\Middleware;

use Closure;

class DocsVerify
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
        
            if (\Auth::check() && \Auth::user()->docs_confirmed == 1) {
            return $next($request);
        } else {
            return response()->json(
                [
                    'status_code' => 402,
                    'message' => 'Please wait for your confirmation by admin',
                    'success' => false,
                    'message_title' => 'Error'
                ]
            );
        }
    }
}
