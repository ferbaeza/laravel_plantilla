<?php

namespace Src\Shared;

use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Http\AuthRoutes;
use Baezeta\Kernel\Laravel\Routes\BaseRoutes;

class SharedRoutesRegister extends BaseRoutes
{
    public static function register(): void
    {
        Route::prefix('')
            ->group(function () {
                AuthRoutes::register();
        });
    }
}
