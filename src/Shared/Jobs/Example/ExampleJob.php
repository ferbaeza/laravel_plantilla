<?php

namespace Src\Shared\Jobs\Example;

use Src\Shared\Jobs\BaseJobs;
use Src\Shared\Events\Example\ExampleEvent;
use Src\Shared\Jobs\Example\ExampleCommand;

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
        return new ExampleCommand(
            $event->id
        );
    }
}
