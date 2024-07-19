<?php

namespace Src\Shared;

use Illuminate\Support\Facades\Route;
use Src\Auth\Core\Laravel\Http\AuthRoutes;
use Baezeta\Kernel\Laravel\Routes\BaseRoutes;

class SharedRegisterRoutes extends BaseRoutes
{
    public static function register(): void
    {
        Route::group([],function () {
            AuthRoutes::register();
        });
    }
}
