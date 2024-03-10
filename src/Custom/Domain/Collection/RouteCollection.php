<?php

namespace Src\Custom\Domain\Collection;

use Src\Custom\Domain\Entity\RouteEntity;
use Src\Shared\Laravel\Collection\BaseCollection;

class RouteCollection extends BaseCollection
{
    protected $type = RouteEntity::class;
    protected $name = 'RouteCollection';
}
