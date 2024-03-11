<?php

namespace Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent;

use Src\Shared\Laravel\Model\CustomModel;

class UsuarioHasRoleModel extends CustomModel
{
    protected $table = 'usuario_has_roles';

    protected static function newFactory()
    {
        return UsuarioHasRoleFactory::new();
    }
}
