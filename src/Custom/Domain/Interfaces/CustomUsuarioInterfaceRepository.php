<?php

namespace Src\Custom\Domain\Interfaces;

use Src\Shared\Criteria\Criteria;
use Src\Custom\Domain\Entity\CustomUsuarioEntity;
use Src\Custom\Domain\Collection\CustomUsuarioCollection;

interface CustomUsuarioInterfaceRepository
{
    public function getEntity(Criteria $criteria): CustomUsuarioEntity;
    public function getCollection(Criteria $criteria): CustomUsuarioCollection;
}
