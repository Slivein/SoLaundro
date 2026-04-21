<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMaintenanceMode
{
    /**
     * Stop normal traffic when the app is in maintenance mode.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Keep the public welcome page available unless maintenance is explicitly enabled.
        if (filter_var(env('IsMaintenanceMode', false), FILTER_VALIDATE_BOOL)) {
            return response()->view('maintenance', [], Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $next($request);
    }
}
