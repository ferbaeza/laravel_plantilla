<?php

namespace Src\Shared\DAO\Usuario\Infrastructure\Bindings;

use Src\Shared\Contrats\Register;
use Src\Shared\DAO\Usuario\Infrastructure\Datasource\UsuarioEloquentRepository;
use Src\Shared\DAO\Usuario\Domain\Interfaces\UsuarioEloquentRepositoryInterface;

class UsuarioRegisterBindings implements Register
{
    public static function register()
    {
        return [
            UsuarioEloquentRepositoryInterface::class => UsuarioEloquentRepository::class,
        ];
    }
} {
}
