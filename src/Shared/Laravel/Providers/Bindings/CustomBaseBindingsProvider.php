<?php

namespace Src\Shared\Laravel\Providers\Bindings;

use Src\Auth\Infrastructure\Bindings\AuthBindings;
use Src\Shared\Dao\Shared\Bindings\SharedDoaBindings;
use Src\Shared\Laravel\Providers\Bindings\Domain\BaseRegisterBindings;
use Src\Custom\Infrastructure\Bindings\CustomBindingsProvider as CustomBindings;

class CustomBaseBindingsProvider extends BaseRegisterBindings
{
    protected function singletons(): array
    {
        return array_merge(
            AuthBindings::singletons(),
            CustomBindings::singletons(),
            SharedDoaBindings::singletons(),
        );
    }
}
