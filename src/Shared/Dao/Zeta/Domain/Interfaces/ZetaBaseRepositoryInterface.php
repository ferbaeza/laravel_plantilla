<?php

namespace Src\Shared\Dao\Zeta\Domain\Interfaces;

use Src\Shared\Criteria\Criteria;
use Src\Shared\Laravel\Interfaces\BaseRepositoryInterface;

interface ZetaBaseRepositoryInterface extends BaseRepositoryInterface
{
    public function getEntity(Criteria $criteria);
    public function getCollection(Criteria $criteria);
}
