<?php

use App\Http\Middleware\IsMaintenanceMode;
use App\Http\Middleware\MemberIsAuthenticated;
use App\Http\Middleware\RedirectIfMemberAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'maintenance' => IsMaintenanceMode::class,
            'auth.member' => MemberIsAuthenticated::class,
            'redirect.if.member' => RedirectIfMemberAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
