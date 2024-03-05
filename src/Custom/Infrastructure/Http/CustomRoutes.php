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
            Route::get('', [CustomController::class, 'index'])->name('custom.view');
            Route::post('/body', [CustomController::class, 'body'])->name('custom.body');
            Route::get('/hello/{name}', [CustomController::class, 'hello'])->name('custom.hello');
        });
    }   

}
