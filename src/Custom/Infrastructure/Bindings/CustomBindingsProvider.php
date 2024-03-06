<?php

namespace Src\Custom\Infrastructure\Bindings;

use Src\Custom\Infrastructure\Datasource\CustomRepository;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;

class CustomBindingsProvider
{
    public static function singletons(): array
    {
        return [
            // 'YourSingleton' => YourSingleton::class,
            CustomInterfaceRepository::class => CustomRepository::class,
        ];
    }
}
