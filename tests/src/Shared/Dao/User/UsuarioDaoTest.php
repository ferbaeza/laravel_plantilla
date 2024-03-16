<?php

namespace Tests\src\Shared\Dao\User;

use Tests\TestCase;
use Illuminate\Support\Str;
use Src\Shared\Criteria\Criteria;
use Src\Shared\Dao\User\Domain\Entity\UserDaoEntity;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Dao\User\Domain\Collection\UserDaoCollection;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Shared\Dao\User\Domain\Interfaces\UsuarioDaoInterfaceRepository;

/**
* @group group_name
* @group group_name
**/

class UsuarioDaoTest extends TestCase
{
    private UsuarioDaoInterfaceRepository $repository;
    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->app->make(UsuarioDaoInterfaceRepository::class);
    }
    
    /** @test*/
    public function test_usuario_dao_entity()
    {

        $usuario = $this->obtenerUsuario();
        $dataUser = UserModel::factory($usuario)->create();

        $criteria = new Criteria();
        $criteria->where('nombre', $dataUser->nombre);

        $usuario = $this->repository->getEntity($criteria);
        $this->assertEquals($usuario->nombre->value(), $dataUser->nombre);
        $this->assertInstanceOf(UserDaoEntity::class, $usuario);
    }

    /** @test*/
    public function test_usuario_dao_collection()
    {
        $expectecUsuarios =3;
        $dataUser = UserModel::factory()->count($expectecUsuarios)->create();
        $criteria = new Criteria();
        $usuario = $this->repository->getCollection($criteria);

        $this->assertEquals($usuario->count(), $expectecUsuarios);
        $this->assertInstanceOf(UserDaoCollection::class, $usuario);
    }


    private function obtenerUsuario():array
    {
        return [
            'id' => UuidValue::id(),
            'nombre' => fake()->name(),
            'primer_apellido' => fake()->name(),
            'segundo_apellido' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
        ];
    }
}

