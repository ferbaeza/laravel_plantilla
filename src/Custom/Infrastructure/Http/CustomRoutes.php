<?php

namespace Src\Custom\Infrastructure\Http;

use Illuminate\Support\Facades\Route;
use Src\Shared\Providers\Routes\CustomRoutesProvider;

class CustomRoutes extends CustomRoutesProvider
{
    protected static string $prefix = 'custom';

    public static function register(): void
    {
        // Register your custom routes here
        Route::prefix(self::$prefix)->group(function () {
            Route::get('', [CustomController::class, 'view'])->name('custom.view');
            Route::get('{name}/', [CustomController::class, 'index'])->name('custom.index');
        });
    }   

}
