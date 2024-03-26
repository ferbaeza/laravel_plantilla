<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Baezeta\Console\Scaffolding\Context\CreateScaffoldind;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Src\Shared\Laravel\Console\CustomCommands\Dao\CreateDaoContext;
use Baezeta\Console\Scaffolding\Context\Commands\CreateFolderContext;
use Baezeta\Console\Scaffolding\Context\Commands\SeleccionarContextos;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CreateDaoContext::class,

        CreateFolderContext::class,
        SeleccionarContextos::class,
        CreateScaffoldind::class,

    ];



    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('custom:comand')->everyMinute();
        // $schedule->command('custom:comandDos')->everyTenMinutes();
        // $schedule->command('custom:customTrs')->dailyAt('00:05');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
