<?php

namespace Src\Shared\Dao\Zeta\Domain\Collection;

use Src\Shared\Laravel\Collection\BaseCollection;
use Src\Shared\Dao\Zeta\Domain\Entity\ZetaBaseEntity;

class ZetaBaseCollection extends BaseCollection
{
    protected $type = ZetaBaseEntity::class;
}
