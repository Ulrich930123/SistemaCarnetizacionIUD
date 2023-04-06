<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'GS\Shared\Infrastructure\Lumen\Console\CreateModuleCommand',
        'GS\Shared\Infrastructure\Lumen\Console\CreateCommandAndHandlerCommand',
        'GS\Shared\Infrastructure\Lumen\Console\CreateQueryAndHandlerCommand',
        'GS\Shared\Infrastructure\Lumen\Console\CreateProviderCommand'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
