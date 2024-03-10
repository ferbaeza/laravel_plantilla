<?php

namespace Src\Custom\Infrastructure\Datasource;

use Src\Custom\Domain\Entity\CustomUsuarioEntity;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;

class CustomRepository extends BaseRepository implements CustomInterfaceRepository
{
    protected string $modelClass = UserModel::class;

    public function save(CustomUsuarioEntity $entidad)
    {
        return UserModel::all()->toArray();
    }
}
