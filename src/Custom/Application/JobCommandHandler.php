<?php

namespace Src\Custom\Application;

use stdClass;
use Src\Custom\Domain\Entity\RouteEntity;
use Src\Custom\Application\WelcomeCommand;
use Src\Custom\Domain\Collection\RouteCollection;
use Src\Shared\Eventos\Custom\CustomExampleEvent;
use Src\Shared\Bus\Shared\Domain\Entity\EventDispatcher;

/**
 * @SuppressWarnings(PHPMD)
 */
class JobCommandHandler
{
    public function run(JobCommand $command)
    {
        dump('JobCommandHandler');
    }
}
