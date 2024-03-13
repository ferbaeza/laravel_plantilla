<?php

namespace App\Console\Commands\Shared\DataBase\templates;

use Zataca\Hydrator\Criteria;
use Src\Shared\Utils\Foundation\BaseRepository\BaseRepository;
use Src\Shared\Database\Context\Domain\Entity\ContextBaseEntity;
use Src\Shared\Database\Context\Domain\Collection\ContextBaseCollection;
use App\Console\Commands\Shared\DataBase\templates\ContextBaseRepositoryInterface;

class ContextBaseRepository extends BaseRepository implements ContextBaseRepositoryInterface
{
    protected string $modelClass = ContextModel::class;
    protected string $collection = ContextBaseCollection::class;
    protected string $entity = ContextBaseEntity::class;

    public function getEntity(Criteria $criteria)
    {
        $entidad = $this->getModel($criteria);
        return $this->hydrate($this->entity, $entidad->toArray());
    }

    public function getCollection(Criteria $criteria)
    {
        $collecion = $this->getModelCollection($criteria);
        return new $this->collection($collecion->toArray());
    }
}
