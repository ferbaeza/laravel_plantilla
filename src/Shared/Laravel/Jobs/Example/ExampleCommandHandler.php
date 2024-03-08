<?php

namespace Src\Shared\Laravel\Jobs\Example;

use Src\Shared\Laravel\Jobs\Example\ExampleCommand;

class ExampleCommandHandler
{
    public function run(ExampleCommand $command)
    {
        return $command;
    }
}
