<?php

namespace Src\Shared\DAO;

use Src\Shared\Contrats\Bindings;
use Src\Shared\DAO\Usuario\Infrastructure\Bindings\UsuarioRegisterBindings;

class DAORegisterBindings implements Bindings
{
    public function bindings()
    {
        return array_merge(
            UsuarioRegisterBindings::register()
        );
    }
}
