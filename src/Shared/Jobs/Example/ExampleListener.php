<?php

namespace Src\Shared\Jobs\Example;

use Src\Shared\Events\Example\ExampleEvent;

class ExampleListener
{
    public function handle(ExampleEvent $event)
    {
        ExampleJob::dispatch($event);
    }
}
