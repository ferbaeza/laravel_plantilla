<?php

namespace Src\Auth\Infrastructure\Bindings;

use Src\Auth\Infrastructure\Datasource\RegisterRepository;
use Src\Auth\Domain\Interfaces\RegisterInterfaceRepository;
use Src\Auth\Infrastructure\Datasource\AuthUsuarioRepository;
use Src\Auth\Domain\Interfaces\AuthUsuarioInterfaceRepository;

class AuthBindings
{
    public static function singletons(): array
    {
        return [
            RegisterInterfaceRepository::class => RegisterRepository::class,
            AuthUsuarioInterfaceRepository::class => AuthUsuarioRepository::class,
        ];
    }
}
