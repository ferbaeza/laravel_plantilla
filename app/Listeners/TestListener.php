<?php

namespace App\Listeners;

use App\Jobs\TestJob;
use App\Events\TestEvent;
use Illuminate\Support\Facades\Log;

class TestListener
{
    /**
     * Create the event listener.
     */
    public function __construct(

    )
    {
    }

    /**
     * Handle the event.
     */
    public function handle(TestEvent $event): void
    {
        Log::info('TestListener handle method called');
        TestJob::dispatch($event);
        // dd($event);
        // return ($event);
    }
}
