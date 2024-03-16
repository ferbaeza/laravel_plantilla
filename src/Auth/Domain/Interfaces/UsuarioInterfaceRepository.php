<?php

namespace Src\Auth\Domain\Interfaces;

use Src\Auth\Application\CrearUsuarioCommand;
use Src\Auth\Application\LoginUsuarioCommand;
use Src\Auth\Domain\Aggregate\UsuarioLogeadoAggregate;
use Src\Shared\Dao\User\Domain\Entity\UserDaoEntity;

interface UsuarioInterfaceRepository
{
    public function crearUsuario(CrearUsuarioCommand $command): UserDaoEntity;
    public function loginUsuario(LoginUsuarioCommand $command): UsuarioLogeadoAggregate;
}
