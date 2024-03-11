<?php

namespace Src\Shared\Laravel\Exceptions\Auth;

use Src\Shared\Laravel\Exceptions\Base\CustomBaseException;
use Src\Shared\Laravel\Exceptions\Auth\UserNoExisteException;

class AuthBaseExceptions extends CustomBaseException
{
    protected static $messages = [
        AuthTokenNoExisteException::class => 'El token no existe',
    ];
}
