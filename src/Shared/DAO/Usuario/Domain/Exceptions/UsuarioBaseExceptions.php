<?php

namespace Src\Shared\DAO\Usuario\Domain\Exceptions;

use Src\Auth\Domain\Exceptions\AuthLoginExcepption;
use Src\Shared\Kernel\Exceptions\BaseException;
use Src\Shared\DAO\Usuario\Domain\Exceptions\UsuarioNoExisteException;

class UsuarioBaseExceptions extends BaseException
{
    protected static $messages = [
        AuthLoginExcepption::class => AuthLoginExcepption::MENSAJE,
        UsuarioNoExisteException::class => UsuarioNoExisteException::MENSAJE,
    ];
}
