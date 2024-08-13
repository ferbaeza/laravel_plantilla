<?php

namespace Src\Auth\Application;

use Src\Shared\Kernel\Command\Base\BaseCommand;
use Src\Shared\Kernel\ValueObjects\Main\UuidValue;

class AuthLogoutCommand extends BaseCommand
{
    public function __construct(
        public UuidValue $idUsuario
    )
    {
        parent::__construct();
    }

}
