<?php

namespace Src\Auth\Application;

use Baezeta\Kernel\Command\Base\CommandBase;

final class AuthLoginCommand extends CommandBase
{
    public function __construct(
        public readonly string $identidad,
        public readonly string $password
    )
        {
    }

}
