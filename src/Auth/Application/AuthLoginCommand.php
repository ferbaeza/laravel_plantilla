<?php

namespace Src\Auth\Application;

use Src\Shared\Kernel\Command\Base\BaseCommand;


final class AuthLoginCommand extends BaseCommand
{
    public function __construct(
        public readonly string $identidad,
        public readonly string $password
    )
        {
            parent::__construct();
    }

}
