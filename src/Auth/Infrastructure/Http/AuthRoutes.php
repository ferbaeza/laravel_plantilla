<?php

namespace Src\Auth\Infrastructure\Http;

use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Http\AuthController;
use Src\Shared\Providers\Routes\CustomRoutesProvider;

class AuthRoutes extends CustomRoutesProvider
{
    protected static string $prefix = 'auth';


    public static function register(): void
    {
        Route::prefix(self::$prefix)->middleware('api')->group(function () {
            Route::get('/invitacion/{token}', [AuthController::class, 'invitacionUsuario'])->name('auth.invitacionUsuario');
            Route::post('/crearUsuario', [AuthController::class, 'crearUsuario'])->name('auth.crearUsuario');
            Route::post('/registrarUsuario', [AuthController::class, 'registrarUsuario'])->name('auth.registrarUsuario');
        });
    }
}
