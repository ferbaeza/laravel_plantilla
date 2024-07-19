<?php

namespace Src\Shared\DAO\Usuario\Infrastructure\Datasource;

use Baezeta\Kernel\Criteria\Criteria;
use Src\Shared\Laravel\BaseRepository;
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
        dd($model->toArray());
        return $model->toArray();
    }

}
