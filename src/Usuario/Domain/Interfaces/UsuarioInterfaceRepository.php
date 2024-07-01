<?php

namespace Src\Usuario\Domain\Interfaces;

use Src\Usuario\Domain\Entity\UsuarioNuevoEntity;

interface UsuarioInterfaceRepository
{
    public function crearUsuario(UsuarioNuevoEntity $usuario): void;
}
