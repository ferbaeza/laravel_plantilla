<?php

namespace Src\Shared\Dao\User\Domain\Collection;

use Src\Shared\Laravel\Collection\BaseCollection;
use Src\Shared\Dao\User\Domain\Entity\UserDaoEntity;

class UserDaoCollection extends BaseCollection
{
    protected $type = UserDaoEntity::class;
}
