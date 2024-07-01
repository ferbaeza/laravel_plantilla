<?php

namespace Src\Usuario\Infrastructure\Datasource;

use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Usuario\Domain\Entity\UsuarioNuevoEntity;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Usuario\Domain\Interfaces\UsuarioInterfaceRepository;

class UsuarioRepository extends BaseRepository implements UsuarioInterfaceRepository
{
    protected string $modelClass = UserModel::class;

    public function crearUsuario(UsuarioNuevoEntity $usuario): void
    {
        $model = new UserModel();
        $model->id = $usuario->id->value();
        $model->email = $usuario->email;
        $model->nombre = $usuario->nombre;
        $model->primer_apellido = $usuario->primerApellido;
        $model->segundo_apellido = $usuario->segundoApellido;
        $model->password = $usuario->password;
        $model->save();
    }

}
