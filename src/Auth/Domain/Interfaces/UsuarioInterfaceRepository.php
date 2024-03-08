<?php

namespace Src\Auth\Domain\Interfaces;

use Src\Auth\Application\CrearUsuarioCommand;
use Src\Auth\Application\LoginUsuarioCommand;
use Src\Auth\Domain\Aggregate\UsuarioLogeadoAggregate;
use Src\Shared\Dao\User\Domain\Entity\UsuarioRegistrado;

interface UsuarioInterfaceRepository
{
    public function crearUsuario(CrearUsuarioCommand $command): UsuarioRegistrado;
    public function loginUsuario(LoginUsuarioCommand $command): UsuarioLogeadoAggregate;
}
