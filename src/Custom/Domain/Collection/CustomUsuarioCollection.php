<?php

namespace Src\Custom\Domain\Collection;

use Src\Custom\Domain\Entity\CustomUsuarioEntity;
use Src\Shared\Laravel\Collection\BaseCollection;

class CustomUsuarioCollection extends BaseCollection
{
    protected $type = CustomUsuarioEntity::class;
    protected $name = 'CustomUsuarioCollection';
}
