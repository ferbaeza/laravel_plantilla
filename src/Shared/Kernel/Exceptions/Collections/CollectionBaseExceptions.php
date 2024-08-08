<?php

namespace Src\Shared\Kernel\Exceptions\Collections;

use Src\Shared\Kernel\Exceptions\KernelBaseException;


class CollectionBaseExceptions extends KernelBaseException
{
    protected static $messages = [
        CustomCollectionExceptions::class => CustomCollectionExceptions::MSG,
    ];

}
