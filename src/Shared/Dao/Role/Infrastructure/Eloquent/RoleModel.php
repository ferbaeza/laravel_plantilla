<?php

namespace Src\Shared\Dao\Role\Infrastructure\Eloquent;

use Src\Shared\Laravel\Model\CustomModel;

class RoleModel extends CustomModel
{
    protected $table = 'roles';

    protected static function newFactory()
    {
        return RoleFactory::new();
    }


}
