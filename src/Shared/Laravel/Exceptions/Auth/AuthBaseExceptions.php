<?php

namespace Src\Shared\Laravel\Exceptions\Auth;

use Src\Shared\Laravel\Exceptions\Base\CustomBaseException;

class AuthBaseExceptions extends CustomBaseException
{
    protected static $messages = [
        AuthTokenNoExisteException::class => 'El token no existe',
    ];
}
