<?php

namespace Src\Auth\Infrastructure\Http;

use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Http\AuthController;
use Src\Shared\Laravel\Providers\Routes\CustomRoutesProvider;

class AuthRoutes extends CustomRoutesProvider
{
    protected static string $prefix = 'auth';


    public static function register(): void
    {
        Route::prefix(self::$prefix)->middleware('api')->group(function () {
            Route::get('/invitacion/{token}', [AuthController::class, 'invitacionUsuario'])->name('auth.invitacionUsuario');
            Route::post('/login', [AuthController::class, 'loginUsuario'])->name('auth.loginUsuario');
            Route::post('/crearUsuario', [AuthController::class, 'crearUsuario'])->name('auth.crearUsuario');
            Route::post('/registrarUsuario', [AuthController::class, 'registrarUsuario'])->name('auth.registrarUsuario');

            Route::get('/test', [AuthController::class, 'test'])->name('auth.test')->middleware('auth:sanctum');
            Route::post('/test', [AuthController::class, 'test'])->name('auth.test-post')->middleware('auth:sanctum');
        });
    }
}
