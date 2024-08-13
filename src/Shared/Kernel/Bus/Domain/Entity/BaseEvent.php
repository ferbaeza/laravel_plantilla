<?php

namespace Src\Shared\Kernel\Bus\Domain\Entity;

use Src\Shared\Kernel\Command\Base\BaseCommand;


class BaseEvent
{
    private BaseCommand $command;

    public function setCommand(BaseCommand $command) //: BaseCommand
    {
        $this->command = $command;
    }
}
