<?php

namespace Src\Auth\Infrastructure\Datasource;

use Illuminate\Support\Facades\Hash;
use Src\Auth\Application\CrearUsuarioCommand;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Shared\Dao\User\Domain\Entity\UsuarioRegistrado;
use Src\Auth\Domain\Interfaces\UsuarioInterfaceRepository;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;

class UsuarioRepository extends BaseRepository implements UsuarioInterfaceRepository
{
    protected string $modelClass = UserModel::class;

    public function crearUsuario(CrearUsuarioCommand $command): UsuarioRegistrado
    {
        $model = new UserModel();
        $model->id = UuidValue::id();
        $model->email = $command->email;
        $model->nombre = $command->nombre;
        $model->password = Hash::make($command->password);
        $model->save();
        return UsuarioRegistrado::create($model->id, $model->nombre, $model->email);
    }
}
