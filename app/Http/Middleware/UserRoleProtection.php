<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRoleProtection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userrole): Response
    {
        // Access the authenticated user
        $user = $request->user();
        // dd($user->role->role_name);
        // Access the role name using the defined relationship
        if ($user->role->role_name !== $userrole)
        {
            return redirect()->route('visitor.home');
        }
        return $next($request);
    }
}
