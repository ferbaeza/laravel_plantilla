<?php

namespace Src\Shared\Dao\Role\Domain\Enums;

enum RoleEnums: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case GUEST = 'guest';
    
}
