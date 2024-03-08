<?php

namespace Src\Shared\Laravel\Exceptions\Auth;

use Src\Shared\Laravel\Exceptions\Auth\AuthBaseExceptions;
use Src\Shared\Laravel\Exceptions\Base\ColorConstantsExceptions;

class UserNoExisteException extends AuthBaseExceptions
{
    const ERROR = ColorConstantsExceptions::RED . " El usuario %s no existe" . ColorConstantsExceptions::NOCOLOR;

    public const BODY = "usuario_domain_exception_001" . self::ERROR;
}
