<?php

namespace Src\Shared\Dao\User\Domain\Interfaces;

use Src\Shared\Criteria\Criteria;
use Src\Shared\Dao\User\Domain\Entity\UserDaoEntity;
use Src\Shared\Laravel\Interfaces\BaseRepositoryInterface;
use Src\Shared\Dao\User\Domain\Collection\UserDaoCollection;

interface UsuarioDaoInterfaceRepository extends BaseRepositoryInterface
{
    public function getEntity(Criteria $criteria): UserDaoEntity;
    public function getCollection(Criteria $criteria): UserDaoCollection;
}
