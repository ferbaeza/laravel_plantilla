<?php

namespace Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent;

use Src\Shared\Laravel\Model\CustomModel;
use Src\Shared\Dao\Role\Infrastructure\Eloquent\RoleModel;

class UsuarioHasRoleModel extends CustomModel
{
    protected $table = 'usuario_has_roles';

    protected static function newFactory()
    {
        return UsuarioHasRoleFactory::new();
    }

    public function roles()
    {
        return $this->hasOne(RoleModel::class, 'id', 'fk_role_id');
    }
}
