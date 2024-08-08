<?php

namespace Src\Shared\Kernel\Bus\Domain;

use Src\Shared\Kernel\Command\Base\BaseCommand;


class BaseEvent
{
    private BaseCommand $command;

    public function setCommand(BaseCommand $command) //: BaseCommand
    {
        $this->command = $command;
    }
}
