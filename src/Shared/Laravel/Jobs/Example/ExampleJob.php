<?php

namespace Src\Shared\Laravel\Jobs\Example;

use Src\Shared\Laravel\Jobs\BaseJobs;
use Src\Shared\Laravel\Events\Example\ExampleEvent;
use Src\Shared\Laravel\Jobs\Example\ExampleCommand;

class ExampleJob extends BaseJobs
{
    public function __construct(
        protected ExampleEvent $event
    ) {
        $this->onQueue('default');
    }

    public function handle()
    {
        $this->run($this->event, $this->createCommand($this->event));
    }

    private function createCommand(ExampleEvent $event)
    {
        return new ExampleCommand($event->id);
    }
}
