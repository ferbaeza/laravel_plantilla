<?php

namespace Src\Shared\Kernel\Entity;

use Src\Shared\Kernel\Entity\CustomBaseEntity;


class EntityBase extends CustomBaseEntity
{
    public function serialize(): mixed
    {
        return get_object_vars($this);
    }
}
