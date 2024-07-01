<?php

namespace Src\Usuario\Infrastructure\Http;

use Illuminate\Support\Facades\Route;
use Src\Shared\Laravel\Providers\Routes\CustomRoutesProvider;

class UsuarioRoutes extends CustomRoutesProvider
{
    protected static string $prefix = 'usuario';


    public static function register(): void
    {
        Route::prefix(self::$prefix)->middleware('api')->group(function () {
            Route::post('/crearUsuario', [UsuarioController::class, 'crearUsuario'])->name('usuario.crearUsuario');
        });
    }
}
