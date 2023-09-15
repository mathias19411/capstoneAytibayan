<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check())
            {
                // Check if the user is trying to access the registration page
                if ($request->routeIs('register')) {
                    return $next($request);
                }
                
                if($request->user()->role === 'itstaff')
                {
                    $url = '/ITStaff/home';
                }
                else if ($request->user()->role === 'project_coordinator')
                {
                    $url = '/ProjectCoordinator/home';
                }
                else if ($request->user()->role === 'beneficiary')
                {
                    $url = '/Beneficiary/home';
                }

                return redirect()->intended($url);
            }
        }

        return $next($request);
    }
}
