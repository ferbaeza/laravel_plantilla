<?php

namespace App\Console\Commands\Shared\DataBase\templates;

use Zataca\Hydrator\BaseCollection;
use Src\Shared\Database\Context\Domain\Entity\ContextBaseEntity;

class ContextBaseCollection extends BaseCollection
{
    protected $type = ContextBaseEntity::class;
}
