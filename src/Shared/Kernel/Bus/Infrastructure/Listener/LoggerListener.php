<?php

namespace Src\Shared\Kernel\Bus\Infrastructure\Listener;

use App\Jobs\TestJob;
use Illuminate\Support\Facades\Log;
use Src\Shared\Kernel\Bus\Domain\Event\LoggerEvent;
use Src\Shared\Kernel\Bus\Infrastructure\Job\LoggerJob;

class LoggerListener
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(LoggerEvent $event): void
    {
        dd(8798);
        Log::info('LoggerEvent handle method called');
        LoggerJob::dispatch($event);
    }
}
