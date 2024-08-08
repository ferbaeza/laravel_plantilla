<?php

namespace Src\Shared\Kernel\Exceptions\Collections;

class CustomCollectionExceptions extends CollectionBaseExceptions
{
    public const MSG = 'You can only add items of type %s to this collection.';
}
