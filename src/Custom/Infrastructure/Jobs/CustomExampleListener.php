<?php

namespace Src\Custom\Infrastructure\Jobs;

use Src\Shared\Eventos\Custom\CustomExampleEvent;

class CustomExampleListener
{
    public function handle(CustomExampleEvent $event)
    {
        CustomExampleJob::dispatch($event);
    }
}
