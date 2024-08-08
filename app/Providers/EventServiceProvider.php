<?php

namespace App\Providers;

use App\Events\TestEvent;
use App\Listeners\TestListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TestEvent::class => [
            TestListener::class,
        ],
    ];


    public function register(): void
    {
    }

    public function boot(): void
    {
        //
    }
}
