<?php

namespace Src\Custom\Infrastructure\Datasource;

use Src\Shared\Criteria\Criteria;
use Src\Custom\Domain\Entity\CustomUsuarioEntity;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Custom\Domain\Interfaces\CustomUsuarioInterfaceRepository;

class CustomUsuarioRepository extends BaseRepository implements CustomUsuarioInterfaceRepository
{
    protected string $modelClass = UserModel::class;

    public function getEntity(Criteria $criteria): CustomUsuarioEntity
    {
        $response = $this->getModelEntity($criteria)->toArray();
        $response = $this->getModelCollection($criteria)->toArray();
        dd($response);
        return new CustomUsuarioEntity(
            nombre: $response['nombre'],
            email: $response['email'],
        );
    }
}
