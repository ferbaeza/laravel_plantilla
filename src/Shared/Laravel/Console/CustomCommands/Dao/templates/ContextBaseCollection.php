<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Dao\templates;
// namespace App\Console\Commands\Dao\templates;

use Src\Shared\Laravel\Collection\BaseCollection;
use Src\Shared\Dao\Context\Domain\Entity\ContextBaseEntity;

class ContextBaseCollection extends BaseCollection
{
    protected $type = ContextBaseEntity::class;
}
