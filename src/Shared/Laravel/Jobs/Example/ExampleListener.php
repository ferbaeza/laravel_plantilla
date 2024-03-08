<?php

namespace Src\Shared\Laravel\Jobs\Example;

use Src\Shared\Laravel\Events\Example\ExampleEvent;

class ExampleListener
{
    public function handle(ExampleEvent $event)
    {
        ExampleJob::dispatch($event);
    }
}
