<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Dao\templates;
// namespace App\Console\Commands\Dao\templates;

use Src\Shared\Criteria\Criteria;
use Src\Shared\Laravel\Interfaces\BaseRepositoryInterface;

interface ContextBaseRepositoryInterface extends BaseRepositoryInterface
{
    public function getEntity(Criteria $criteria);
    public function getCollection(Criteria $criteria);
}
