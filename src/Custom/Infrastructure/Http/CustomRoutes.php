<?php

namespace Src\Custom\Infrastructure\Http;

use Illuminate\Support\Facades\Route;
use Src\Shared\Contrats\Domain\CustomBaseRoute;

class CustomRoutes extends CustomBaseRoute
{
    public static function register(): void
    {
        // Register your custom routes here
        Route::prefix('api/custom/')->group(function () {
            Route::get('', [CustomController::class, 'view']);
            Route::get('{name}/', [CustomController::class, 'index']);
        });
    }   

}
