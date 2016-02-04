<?php

namespace Networks\Http\Middleware;

use Closure;
use Input;

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
            $request->session()->put('network_id', auth()->user()->client->networks()->first()->id);
        } elseif ($request->session()->has('network_id') && Input::has('network_id')) {
            $request->session()->put('network_id', Input::get('network_id'));
            return redirect()->route($request->route()->getName());
        }
        return $next($request);
    }
}
