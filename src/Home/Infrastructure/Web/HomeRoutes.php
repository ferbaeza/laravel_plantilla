<?php

namespace Src\Home\Infrastructure\Web;

use Illuminate\Support\Facades\Route;
use Src\Shared\Providers\Routes\CustomRoutesProvider;


class HomeRoutes extends CustomRoutesProvider
{
    protected static string $prefix = 'home';


    public static function register(): void
    {
        Route::prefix(self::$prefix)->middleware('api')->group(function () {
            Route::get('/bye', [HomeController::class, 'hello'])->name('home.bye');
            Route::get('/hello/{name}', [HomeController::class, 'hello'])->name('home.hello');
        });
    }
}
