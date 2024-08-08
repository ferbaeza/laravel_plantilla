<?php

namespace Src\Shared\Kernel\Entity;

use Src\Shared\Kernel\Base\BaseKernelEntity;

class BaseEntity extends BaseKernelEntity
{
    public function serialize(): mixed
    {
        return get_object_vars($this);
    }
}
