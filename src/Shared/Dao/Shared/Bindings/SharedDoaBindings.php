<?php

namespace Src\Shared\Dao\Shared\Bindings;

use Src\Shared\Dao\User\Infrastructure\Bindings\UsuarioDaoBindingsProvider;

class SharedDoaBindings
{
    public static function singletons(): array
    {
        return array_merge(
            UsuarioDaoBindingsProvider::singletons(),
        );
    }
}
