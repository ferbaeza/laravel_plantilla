<?php

namespace Src\Shared\DAO\Usuario\Infrastructure\Datasource;

use Src\Shared\Kernel\Criteria\Criteria;
use Src\Shared\Kernel\Laravel\Repository\BaseRepository;
use Src\Shared\DAO\Usuario\Domain\Factory\UsuarioFactory;
use Src\Shared\DAO\Usuario\Infrastructure\Eloquent\UsuarioModel;
use Src\Shared\DAO\Usuario\Domain\Exceptions\UsuarioNoExisteException;
use Src\Shared\DAO\Usuario\Domain\Interfaces\UsuarioEloquentRepositoryInterface;

class UsuarioEloquentRepository extends BaseRepository implements UsuarioEloquentRepositoryInterface
{
    protected string $modelClass = UsuarioModel::class;

    public function getEntity(Criteria $criteria)
    {
        $model = $this->getModelEntity($criteria);
        if (!$model) {
            throw UsuarioNoExisteException::create();;
        }
        return UsuarioFactory::create($model->toArray());
    }

}
