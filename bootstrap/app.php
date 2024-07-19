<?php

use Src\Shared\SharedRegisterRoutes;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Src\Auth\Infrastructure\Http\AuthRoutes;
use Src\Auth\Infrastructure\Http\AuthController;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {

            Route::prefix('/api')
                ->middleware('api')
                ->group(function () {
            SharedRegisterRoutes::register();
                });
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
