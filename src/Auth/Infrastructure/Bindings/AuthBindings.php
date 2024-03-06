<?php

namespace Src\Auth\Infrastructure\Bindings;

use Src\Auth\Infrastructure\Datasource\AuthRepository;
use Src\Auth\Domain\Interfaces\AuthInterfaceRepository;

class AuthBindings
{
    public static function singletons(): array
    {
        return [
            AuthInterfaceRepository::class => AuthRepository::class,
        ];
    }
}
