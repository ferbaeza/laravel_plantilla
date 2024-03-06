<?php

namespace Src\Shared\Providers\Bindings;

use Src\Home\Infrastructure\Bindings\HomeBindings;
use Src\Custom\Infrastructure\Bindings\CustomBindingsProvider as CustomBindings;
use Src\Shared\Providers\Bindings\Domain\BaseRegisterBindings;

class CustomBindingsProvider extends BaseRegisterBindings
{
    protected function singletons(): array
    {
        return array_merge(
            HomeBindings::singletons(),
            CustomBindings::singletons(),
        );
    }
}
