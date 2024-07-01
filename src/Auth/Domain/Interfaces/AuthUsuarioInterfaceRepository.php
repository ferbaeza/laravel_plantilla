<?php

namespace Src\Auth\Domain\Interfaces;

use Src\Auth\Application\LoginUsuarioCommand;
use Src\Auth\Domain\Aggregate\UsuarioLogeadoAggregate;

interface AuthUsuarioInterfaceRepository
{
    public function loginUsuario(LoginUsuarioCommand $command): UsuarioLogeadoAggregate;
}
