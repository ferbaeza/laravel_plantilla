<?php

namespace Src\Shared;

use Src\Shared\Contrats\Bindings;
use Src\Auth\Core\Laravel\Bindings\AuthRegisterBindings;

class SharedRegisterBindings implements Bindings
{
    public function bindings()
    {
        return array_merge(
            AuthRegisterBindings::register()
        );
    }
}
