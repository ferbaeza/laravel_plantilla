<?php

namespace Src\Auth\Core\Laravel\Bindings;

use Src\Shared\Contrats\Register;
use Src\Auth\Core\Adapters\Driver\AuthAdapter;
use Src\Auth\Core\Adapters\Driven\AuthEloquentAdapter;
use Src\Auth\Core\Ports\Driver\AuthDriverInterface;
use Src\Auth\Core\Ports\Driven\AuthEloquentDrivenInterface;

class AuthRegisterBindings implements Register
{
    public static function register()
    {
        return [
            AuthDriverInterface::class => AuthAdapter::class,
            AuthEloquentDrivenInterface::class => AuthEloquentAdapter::class,
        ];
    }
} {
}
