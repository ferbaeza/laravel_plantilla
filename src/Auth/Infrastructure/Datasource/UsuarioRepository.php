<?php

namespace Src\Auth\Infrastructure\Datasource;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Src\Auth\Application\CrearUsuarioCommand;
use Src\Auth\Application\LoginUsuarioCommand;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Auth\Domain\Aggregate\UsuarioLogeadoAggregate;
use Src\Shared\Dao\User\Domain\Entity\UsuarioRegistrado;
use Src\Auth\Domain\Interfaces\UsuarioInterfaceRepository;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Shared\Laravel\Exceptions\Usuario\UserNoExisteException;

class UsuarioRepository extends BaseRepository implements UsuarioInterfaceRepository
{
    protected string $modelClass = UserModel::class;

    public function crearUsuario(CrearUsuarioCommand $command): UsuarioRegistrado
    {
        $model = new UserModel();
        $model->id = UuidValue::id();
        $model->email = $command->email;
        $model->nombre = $command->nombre;
        $model->primer_apellido = $command->primerApellido;
        $model->segundo_apellido = $command->segundoApellido;
        $model->password = Hash::make($command->password);
        $model->save();
        return UsuarioRegistrado::create($model->id, $model->nombre, $model->email);
    }

    public function loginUsuario(LoginUsuarioCommand $command): UsuarioLogeadoAggregate
    {
        if (!Auth::attempt(['email' => $command->email, 'password' => $command->password])) {
            throw UserNoExisteException::drop($command->email);
        }
        $user = (Auth::user());
        $token = $user->createToken('token-name')->plainTextToken;
        return UsuarioLogeadoAggregate::fromRepo($user, $token);
    }
}
