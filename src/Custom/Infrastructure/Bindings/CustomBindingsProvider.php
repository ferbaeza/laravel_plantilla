<?php

namespace Src\Custom\Infrastructure\Bindings;

use Src\Custom\Infrastructure\Datasource\CustomRepository;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;
use Src\Custom\Infrastructure\Datasource\CustomUsuarioRepository;
use Src\Custom\Domain\Interfaces\CustomUsuarioInterfaceRepository;

class CustomBindingsProvider
{
    public static function singletons(): array
    {
        return [
            // 'YourSingleton' => YourSingleton::class,
            CustomInterfaceRepository::class => CustomRepository::class,
            CustomUsuarioInterfaceRepository::class => CustomUsuarioRepository::class,
        ];
    }
}
