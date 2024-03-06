<?php

namespace Src\Shared\Providers\Bindings;

use Src\Auth\Infrastructure\Bindings\AuthBindings;
use Src\Shared\Providers\Bindings\Domain\BaseRegisterBindings;
use Src\Custom\Infrastructure\Bindings\CustomBindingsProvider as CustomBindings;

class CustomBindingsProvider extends BaseRegisterBindings
{
    protected function singletons(): array
    {
        return array_merge(
            AuthBindings::singletons(),
            CustomBindings::singletons(),
        );
    }
}
