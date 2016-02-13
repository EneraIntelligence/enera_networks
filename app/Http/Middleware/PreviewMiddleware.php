<?php

namespace Networks\Http\Middleware;

use Auth;
use Closure;
use Networks\Administrator;
use Networks\Libraries\PreviewHelper;

class PreviewMiddleware
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
        $route = $request->route()->getName();
        $user = Administrator::where('_id', Auth::user()->_id)->first();
        $test = isset($user->routeNetworks) ? $user->routeNetworks : [];

        if ($route != "home" && $route != 'auth.logout' && $route != 'campaigns::show' && $route != 'branches::show'
            && $route != 'edit.profile') {
            array_unshift($test, PreviewHelper::getNameRoute($route) . '/' . $route);
        }
        if (count($test) > 5) {
            array_pop($test);
        }
        $diff = array_unique($test);
        $user->routeNetworks = $diff;
        $user->tour_taken=true;
        $user->save();
        return $next($request);
    }
}
