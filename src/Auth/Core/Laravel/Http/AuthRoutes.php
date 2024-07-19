<?php

namespace Src\Auth\Core\Laravel\Http;

use Illuminate\Support\Facades\Route;
use Baezeta\Kernel\Laravel\Routes\BaseRoutes;

class AuthRoutes extends BaseRoutes
{
    private static string $prefix = 'auth';

    public static function register(): void
    {
        Route::prefix(self::$prefix)
            ->group(function () {
                Route::post('login', [AuthController::class, 'login'])->name('login')->withoutMiddleware(['auth:sanctum']);
                Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            });
    }
}
