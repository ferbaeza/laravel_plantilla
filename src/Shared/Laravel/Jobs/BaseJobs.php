<?php

namespace Src\Shared\Laravel\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;

class BaseJobs implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function run($event, $command)
    {
        $event = $event;
        return CommandBusFacade::process($command);
    }
}
