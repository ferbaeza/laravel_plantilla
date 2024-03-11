<?php

namespace Src\Shared\Laravel\Exceptions\Usuario;

use Src\Shared\Laravel\Exceptions\Usuario\UsuarioBaseException;
use Src\Shared\Laravel\Exceptions\Base\ColorConstantsExceptions;

class UserNoExisteException extends UsuarioBaseException
{
    const ERROR = ColorConstantsExceptions::RED . " El usuario no existe" . ColorConstantsExceptions::NOCOLOR;
    public const BODY = "usuario_domain_exception_001" . self::ERROR;
}
