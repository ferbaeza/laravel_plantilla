<?php

namespace Src\Shared\Providers\Routes;

use Src\Custom\Infrastructure\Http\CustomRoutes;
use Src\Shared\Contrats\Domain\CustomBaseRoute;

class CustomProvidersRoutes extends CustomBaseRoute
{
    public static function register(): void
    {
        CustomRoutes::register();
    }
}
