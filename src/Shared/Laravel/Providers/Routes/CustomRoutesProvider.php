<?php

namespace Src\Shared\Laravel\Providers\Routes;

use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Http\AuthRoutes;
use Src\Custom\Infrastructure\Http\CustomRoutes;
use Src\Usuario\Infrastructure\Http\UsuarioRoutes;
use Src\Shared\Laravel\Providers\Routes\Domain\RoutesBaseRegister;

class CustomRoutesProvider extends RoutesBaseRegister
{
    protected static string $prefix = 'api';

    public static function register(): void
    {
        Route::prefix(self::$prefix)->middleware('api')
            ->group(function () {
                CustomRoutes::register();
                AuthRoutes::register();
                UsuarioRoutes::register();
            });
    }
}
