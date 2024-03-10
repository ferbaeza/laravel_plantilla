<?php

namespace Src\Shared\Laravel\Exceptions\CustomExceptions;

use Src\Shared\Laravel\Exceptions\Base\CustomBaseException;
use Src\Shared\Laravel\Exceptions\CustomExceptions\CustomCollectionExceptions;

class BaseExceptions extends CustomBaseException
{
    protected static $messages = [
        CustomCollectionExceptions::class => CustomCollectionExceptions::MSG,
    ];
}
