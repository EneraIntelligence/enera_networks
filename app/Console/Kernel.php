<?php

namespace Networks\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Networks\Console\Commands\Inspire::class,
        \Networks\Console\Commands\RecurrentDevices::class,
        \Networks\Console\Commands\ActiveDevices::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
            ->hourly();

        $filepath = base_path() . "\storage\logs\commands\Enera_RecurrentDevices.txt";;
        $schedule->command('enera:RecurrentDevices')
            ->daily()
            ->sendOutputTo($filepath)
            ->emailOutputTo('ediaz@enera.mx');

    }
}
