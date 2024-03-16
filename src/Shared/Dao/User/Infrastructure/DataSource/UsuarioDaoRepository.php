<?php

namespace Src\Shared\Dao\User\Infrastructure\DataSource;

use Src\Shared\Criteria\Criteria;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Shared\Dao\User\Domain\Entity\UserDaoEntity;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Dao\User\Domain\Collection\UserDaoCollection;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Shared\Laravel\Exceptions\Usuario\UserNoExisteException;
use Src\Shared\ValueObjects\Primitivos\Strings\StringValueObject;
use Src\Shared\Dao\User\Domain\Interfaces\UsuarioDaoInterfaceRepository;

class UsuarioDaoRepository extends BaseRepository implements UsuarioDaoInterfaceRepository
{
    protected string $modelClass = UserModel::class;
    protected string $collection = UserDaoCollection::class;
    protected string $entity = UserDaoEntity::class;


    public function getEntity(Criteria $criteria): UserDaoEntity
    {
        $response = $this->getModelEntity($criteria);
        if (!$response) {
            throw UserNoExisteException::create();
        }
        $usuario = $response->toArray();
        return new UserDaoEntity(
            id: new UuidValue($usuario['id']),
            nombre: new StringValueObject($usuario['nombre']),
            email: new StringValueObject($usuario['email']),

        );
    }

    public function getCollection(Criteria $criteria): UserDaoCollection
    {
        $collection = new $this->collection();

        $data = $this->getModelCollection($criteria);
        foreach ($data->toArray() as $usuario) {
            $collection->add(new UserDaoEntity(
                id: new UuidValue($usuario['id']),
                nombre: new StringValueObject($usuario['nombre']),
                email: new StringValueObject($usuario['email']),
            ));
        }
        return $collection;
    }

}
