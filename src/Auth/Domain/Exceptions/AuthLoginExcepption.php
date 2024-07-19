<?php

namespace Src\Auth\Domain\Exceptions;

use Src\Shared\DAO\Usuario\Domain\Exceptions\UsuarioBaseExceptions;

class AuthLoginExcepption extends UsuarioBaseExceptions
{
    public const MENSAJE = 'Credenciales incorrectas para el Usuario %s';
}
