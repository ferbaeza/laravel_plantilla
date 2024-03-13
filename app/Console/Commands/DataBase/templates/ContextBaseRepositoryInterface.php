<?php

namespace App\Console\Commands\Shared\DataBase\templates;

use Zataca\Hydrator\Criteria;
use Src\Shared\Utils\Foundation\BaseRepository\BaseRepositoryInterface;

interface ContextBaseRepositoryInterface extends BaseRepositoryInterface
{
    public function getEntity(Criteria $criteria);
    public function getCollection(Criteria $criteria);
}
