<?php

namespace Src\Custom\Infrastructure\Datasource;

use Src\Shared\Criteria\Criteria;
use Src\Custom\Domain\Entity\CustomUsuarioEntity;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Custom\Domain\Collection\CustomUsuarioCollection;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Laravel\Exceptions\Usuario\UsuarioBaseException;
use Src\Shared\Laravel\Exceptions\Usuario\UserNoExisteException;
use Src\Custom\Domain\Interfaces\CustomUsuarioInterfaceRepository;

class CustomUsuarioRepository extends BaseRepository implements CustomUsuarioInterfaceRepository
{
    protected string $modelClass = UserModel::class;

    public function getEntity(Criteria $criteria): CustomUsuarioEntity
    {
        $response = $this->getModelEntity($criteria);
        if (!$response) {
            throw UserNoExisteException::create();
        }
        $response = $response->toArray();

        return new CustomUsuarioEntity(
            nombre: $response['nombre'],
            email: $response['email'],
            roles: $response['roles']
        );
    }

    public function getCollection(Criteria $criteria): CustomUsuarioCollection
    {
        $collection = new CustomUsuarioCollection();
        $response = $this->getModelCollection($criteria);
        $response = $response->toArray();

        foreach ($response as $usuario) {
            $collection->add(new CustomUsuarioEntity(
                nombre: $usuario['nombre'],
                email: $usuario['email'],
                roles: $usuario['roles']
            ));
        }

        $collection->map(function ($usuario) use ($collection) {
            if (empty($usuario->roles[0])) {
                $collection->ignore($usuario);
                // $collection->delete($usuario);
            }
        });
        return $collection;
    }
}
