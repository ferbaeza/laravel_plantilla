<?php

namespace Src\Shared\Laravel\Events;

use Src\Shared\Laravel\Command\BaseCommand;

class BaseEvent
{
    private BaseCommand $command;
    public function __construct() 
    {
    }

    public function setCommand(BaseCommand $command)//: BaseCommand
    {
        $this->command = $command;
    }
}
