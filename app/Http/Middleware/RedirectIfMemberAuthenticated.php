<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfMemberAuthenticated
{
    /**
     * Protect member-only dashboard pages.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! empty(session('current_member'))) {
            return redirect()->route(RouteServiceProvider::MAIN);
        }

        return $next($request);
    }
}
