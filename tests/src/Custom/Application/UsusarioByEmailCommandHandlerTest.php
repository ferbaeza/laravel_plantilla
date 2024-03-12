<?php

namespace Tests\src\Custom\Application;

use Tests\TestCase;
use Src\Custom\Application\UsusarioByEmailCommand;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Shared\Dao\Role\Infrastructure\Eloquent\RoleModel;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent\UsuarioHasRoleModel;
use Src\Shared\Laravel\Exceptions\Usuario\UserNoExisteException;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;

class UsusarioByEmailCommandHandlerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }


    /** @test */
    public function deberia_devolver_los_datos_de_un_usuario_usando_Criteria()
    {
        $usuario = UserModel::factory([
            'nombre' => 'fer',
            'email' => 'baezacode@gmail.com'
        ])->create();

        $role = RoleModel::factory()->create();
        UserModel::factory()->count(5)->create();

        UsuarioHasRoleModel::factory([
            'fk_usuario_id' => $usuario->id,
            'fk_role_id' => $role->id,
        ])->create();

        $command = new UsusarioByEmailCommand($usuario->email);
        $response = CommandBusFacade::process($command);
        $this->assertIsArray($response);
        $this->assertEquals($response['Usuario buscado segun Criteria']['nombre'], $usuario->nombre);
        $this->assertEquals($response['Usuario buscado segun Criteria']['email'], $usuario->email);
    }

    /** @test */
    public function deberia_lanzar_excep_al_no_existir_usuario()
    {
        $this->expectException(UserNoExisteException::class);

        $email = 'test@gmail.com';
        $command = new UsusarioByEmailCommand($email);
        CommandBusFacade::process($command);
    }


    /** @test */
    // public function deberia_devolver_los_datos_de_un_usuario_usando_Criteria()
    // {
    //     $usuario = UserModel::factory([
    //         'nombre' => 'fer',
    //         'email' => 'baezacode@gmail.com'
    //     ])->create();

    //     $userDos = UserModel::factory()->create();
    //     $role = RoleModel::factory()->create();
    //     UserModel::factory()->count(5)->create();

    //     UsuarioHasRoleModel::factory([
    //         'fk_usuario_id' => $usuario->id,
    //         'fk_role_id' => $role->id,
    //     ])->create();

    //     UsuarioHasRoleModel::factory([
    //         'fk_usuario_id' => $userDos->id,
    //         'fk_role_id' => $role->id,
    //     ])->create();
    //     $command = new UsusarioByEmailCommand($usuario->email);
    //     CommandBusFacade::process($command);
    // }
}
