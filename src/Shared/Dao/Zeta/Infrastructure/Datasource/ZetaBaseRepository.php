<?php

namespace Src\Shared\Dao\Zeta\Infrastructure\Datasource;

use Exception;
use Src\Shared\Criteria\Criteria;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Shared\Dao\Zeta\Domain\Entity\ZetaBaseEntity;
use Src\Shared\Dao\Zeta\Domain\Collection\ZetaBaseCollection;
use Src\Shared\Dao\Zeta\Domain\Interfaces\ZetaBaseRepositoryInterface;

class ZetaBaseRepository extends BaseRepository implements ZetaBaseRepositoryInterface
{
    protected string $modelClass = ZetaModel::class;
    protected string $collection = ZetaBaseCollection::class;
    protected string $entity = ZetaBaseEntity::class;

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
