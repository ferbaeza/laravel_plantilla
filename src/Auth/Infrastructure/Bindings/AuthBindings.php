<?php

namespace Src\Auth\Infrastructure\Bindings;

use Src\Auth\Infrastructure\Datasource\RegisterRepository;
use Src\Auth\Domain\Interfaces\RegisterInterfaceRepository;
use Src\Auth\Infrastructure\Datasource\UsuarioRepository;
use Src\Auth\Domain\Interfaces\UsuarioInterfaceRepository;

class AuthBindings
{
    public static function singletons(): array
    {
        return [
            RegisterInterfaceRepository::class => RegisterRepository::class,
            UsuarioInterfaceRepository::class => UsuarioRepository::class,
        ];
    }
}
