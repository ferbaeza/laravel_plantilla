<?php

namespace Src\Custom\Infrastructure\Bindings;

use Src\Shared\Container\BaseRegisterBindings;
use Src\Custom\Infrastructure\DataSource\CustomRepository;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;

class CustomBindingsProvider extends BaseRegisterBindings
{
    protected function singletons(): array
    {
        return [
            // 'YourSingleton' => YourSingleton::class,
            CustomInterfaceRepository::class => CustomRepository::class,
        ];
    }

}
