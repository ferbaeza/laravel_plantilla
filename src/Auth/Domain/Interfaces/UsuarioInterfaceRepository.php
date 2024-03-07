<?php

namespace Src\Auth\Domain\Interfaces;

use Src\Auth\Application\CrearUsuarioCommand;
use Src\Shared\Dao\User\Domain\Entity\UsuarioRegistrado;

interface UsuarioInterfaceRepository
{
    public function crearUsuario(CrearUsuarioCommand $command): UsuarioRegistrado;
}
