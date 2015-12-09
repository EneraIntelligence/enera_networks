<?php

namespace Networks\Http\Middleware;

use Closure;

class NotAuthMiddleware
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
        if (auth()->check()) {
            return redirect()->route('home');
        } else {
            return $next($request);
        }
    }
}
