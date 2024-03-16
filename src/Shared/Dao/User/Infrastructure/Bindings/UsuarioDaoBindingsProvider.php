<?php

namespace Src\Shared\Dao\User\Infrastructure\Bindings;

use Src\Shared\Dao\User\Infrastructure\DataSource\UsuarioDaoRepository;
use Src\Shared\Dao\User\Domain\Interfaces\UsuarioDaoInterfaceRepository;


class UsuarioDaoBindingsProvider
{
    public static function singletons(): array
    {
        return [
            // 'YourSingleton' => YourSingleton::class,
            UsuarioDaoInterfaceRepository::class => UsuarioDaoRepository::class,
        ];
    }
}
