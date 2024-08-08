<?php

namespace Src\Shared\Kernel\Exceptions\Collections;

use Src\Shared\Kernel\Exceptions\BaseException;


class CollectionBaseExceptions extends BaseException
{
    protected static $messages = [
        CustomCollectionExceptions::class => CustomCollectionExceptions::MSG,
    ];

}
