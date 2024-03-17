<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Dao\templates;

// namespace App\Console\Commands\Dao\templates;

use Exception;
use Src\Shared\Criteria\Criteria;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Shared\Dao\Context\Domain\Entity\ContextBaseEntity;
use Src\Shared\Dao\Context\Domain\Collection\ContextBaseCollection;
use App\Console\Commands\Dao\templates\ContextBaseRepositoryInterface;

class ContextBaseRepository extends BaseRepository implements ContextBaseRepositoryInterface
{
    protected string $modelClass = ContextModel::class;
    protected string $collection = ContextBaseCollection::class;
    protected string $entity = ContextBaseEntity::class;

    public function getEntity(Criteria $criteria)
    {
        $response = $this->getModelEntity($criteria);
        if (!$response) {
            throw new Exception("No existe $this->modelClass");
        }
        $usuario = $response->toArray();
        return;
    }

    public function getCollection(Criteria $criteria)
    {
        $returnCollection = new $this->collection();
        $collecion = $this->getModelCollection($criteria);
        $response = $collecion->toArray();
        return $returnCollection;
    }
}
