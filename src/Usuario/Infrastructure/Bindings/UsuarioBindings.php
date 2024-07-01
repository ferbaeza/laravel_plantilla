<?php

namespace Src\Usuario\Infrastructure\Bindings;

use Src\Usuario\Infrastructure\Datasource\UsuarioRepository;
use Src\Usuario\Domain\Interfaces\UsuarioInterfaceRepository;


class UsuarioBindings
{
    public static function singletons(): array
    {
        return [
            UsuarioInterfaceRepository::class => UsuarioRepository::class,
        ];
    }
}
