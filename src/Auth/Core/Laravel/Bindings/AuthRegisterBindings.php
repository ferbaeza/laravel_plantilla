<?php

namespace Src\Auth\Core\Laravel\Bindings;

use Src\Shared\Contrats\Register;
use Src\Auth\Core\Adapters\Driver\AuthLoginAdapter;
use Src\Auth\Core\Adapters\Driven\AuthEloquentAdapter;
use Src\Auth\Core\Ports\Driver\AuthLoginDriverInterface;
use Src\Auth\Core\Ports\Driven\AuthEloquentDrivenInterface;

class AuthRegisterBindings implements Register
{
    public static function register()
    {
        return [
            AuthLoginDriverInterface::class => AuthLoginAdapter::class,
            AuthEloquentDrivenInterface::class => AuthEloquentAdapter::class,
        ];
    }
} {
}
