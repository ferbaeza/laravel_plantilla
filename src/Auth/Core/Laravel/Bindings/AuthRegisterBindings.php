<?php

namespace Src\Auth\Core\Laravel\Bindings;

use Src\Shared\Contrats\Register;
use Src\Auth\Core\Adapters\AuthLoginAdapter;
use Src\Auth\Core\Ports\AuthLoginPortInterface;

class AuthRegisterBindings implements Register
{
    public static function register()
    {
        return [
            AuthLoginPortInterface::class => AuthLoginAdapter::class,
        ];
    }
} {
}
