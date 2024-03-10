<?php

namespace Src\Shared\Laravel\Exceptions\CustomExceptions;

use Src\Shared\Laravel\Exceptions\CustomExceptions\BaseExceptions;

class CustomCollectionExceptions extends BaseExceptions
{
    const MSG = 'You can only add items of type %s to this collection.';
}
