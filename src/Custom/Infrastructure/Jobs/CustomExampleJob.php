<?php

namespace Src\Custom\Infrastructure\Jobs;


use Src\Shared\Laravel\Jobs\BaseJobs;
use Src\Custom\Application\JobCommand;
use Src\Shared\Eventos\Custom\CustomExampleEvent;

class CustomExampleJob extends BaseJobs
{
    public function __construct(
        protected CustomExampleEvent $event
    ) {
        $this->onQueue('default');
    }

    public function handle()
    {
        $this->run($this->event, $this->createCommand($this->event));
    }

    private function createCommand(CustomExampleEvent $event)
    {
        return new JobCommand($event->id);
    }
}
