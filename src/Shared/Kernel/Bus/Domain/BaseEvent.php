<?php

namespace Src\Shared\Kernel\Bus\Domain;

use Src\Shared\Kernel\Command\Base\CommandBase;


class BaseEvent
{
    private CommandBase $command;

    public function setCommand(CommandBase $command) //: BaseCommand
    {
        $this->command = $command;
    }
}
