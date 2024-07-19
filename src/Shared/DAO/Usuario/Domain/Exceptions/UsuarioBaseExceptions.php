<?php

namespace Src\Shared\DAO\Usuario\Domain\Exceptions;

use Baezeta\Kernel\Exceptions\KernelBaseException;
use Src\Auth\Domain\Exceptions\AuthLoginExcepption;

class UsuarioBaseExceptions extends KernelBaseException
{
    protected static $messages = [
        AuthLoginExcepption::class => AuthLoginExcepption::MENSAJE,
        UsuarioNoExisteException::class => UsuarioNoExisteException::MENSAJE,
    ];
}
