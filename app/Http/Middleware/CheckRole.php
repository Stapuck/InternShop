<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next, $role_title)
    {
        if (Auth::check() && Auth::user()->roles->title === $role_title) {
            // Allow access to all URLs if the user has an admin role
            if ($role_title === 'Admin') {
                return $next($request);
            } else {
                // Allow access to URLs starting with "/student/"
                if (strpos($request->getPathInfo(), '/student/') === 0) {
                    return $next($request);
                }
                // Allow access to URLs starting with "/pilote/"
                if (strpos($request->getPathInfo(), '/pilot/') === 0) {
                    return $next($request);
                }
                // Allow access to URLs starting with "/company/"
                if (strpos($request->getPathInfo(), '/company/') === 0) {
                    return $next($request);
                }
            }
        }
        // Allow access to admins for all URLs
        if (Auth::check() && Auth::user()->roles->title === 'Admin') {
            return $next($request);
        }

        abort(403, 'Is there a problem?');
    }
}
