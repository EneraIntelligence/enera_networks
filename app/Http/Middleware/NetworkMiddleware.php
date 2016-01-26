<?php

namespace Networks\Http\Middleware;

use Closure;

class NetworkMiddleware
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
        if (!$request->session()->has('network_id')) {
            $id = '';
            dd(auth()->user());
            $request->session()->put('network_id', $id);
        }
        return $next($request);
    }
}
