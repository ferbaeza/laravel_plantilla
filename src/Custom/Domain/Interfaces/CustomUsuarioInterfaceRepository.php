<?php

namespace Src\Custom\Domain\Interfaces;

use Src\Shared\Criteria\Criteria;
use Src\Custom\Domain\Entity\CustomUsuarioEntity;

interface CustomUsuarioInterfaceRepository
{
    public function getEntity(Criteria $criteria): CustomUsuarioEntity;
}
