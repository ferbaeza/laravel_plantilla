<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Dao\templates;

// namespace App\Console\Commands\Dao\templates;

use Exception;
use Src\Shared\Criteria\Criteria;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Shared\Dao\Context\Domain\Entity\ContextBaseEntity;
use Src\Shared\Dao\Context\Domain\Collection\ContextBaseCollection;
use App\Console\Commands\Dao\templates\ContextBaseRepositoryInterface;

/** @phpstan-ignore-next-line */
class ContextBaseRepository extends BaseRepository implements ContextBaseRepositoryInterface
{
    /** @phpstan-ignore-next-line */
    protected string $modelClass = ContextModel::class;
    /** @phpstan-ignore-next-line */
    protected string $collection = ContextBaseCollection::class;
    /** @phpstan-ignore-next-line */
    protected string $entity = ContextBaseEntity::class;

    public function getEntity(Criteria $criteria)
    {
        $response = $this->getModelEntity($criteria);
        if (!$response) {
            throw new Exception("No existe $this->modelClass");
        }
        $usuario = $response->toArray();
        return $usuario;
    }

    public function getCollection(Criteria $criteria)
    {
        $returnCollection = new $this->collection();
        $collecion = $this->getModelCollection($criteria);
        $collecion->toArray();
        return $returnCollection;
    }
}
