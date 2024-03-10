<?php

namespace Src\Shared\Laravel\Entity;

class CustomBaseEntity implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
