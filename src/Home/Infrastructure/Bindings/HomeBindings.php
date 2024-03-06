<?php

namespace Src\Home\Infrastructure\Bindings;

use Src\Home\Domain\Interfaces\HomeInterfaceRepository;
use Src\Home\Infrastructure\Persistence\HomeRepository;

class HomeBindings
{
    public static function singletons(): array
    {
        return [
            HomeInterfaceRepository::class => HomeRepository::class,
        ];
    }
}
