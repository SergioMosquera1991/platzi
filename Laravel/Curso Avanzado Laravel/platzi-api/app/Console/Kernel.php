<?php

namespace App\Console;

use App\Console\Commands\SendEmailVerificationReminderCommand;
use App\Console\Commands\NewCommand;
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
        NewCommand::class,
        SendEmailVerificationReminderCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')->hourly();
        $schedule->command('inspire')
                ->evenInMaintenanceMode()
                ->sendOutputTo(storage_path('inspire.log'))
                ->everyMinute();

        $schedule->call(function(){
            echo "Hola";
        })->everyFiveMinutes();

        $schedule->command(NewCommand::class)
                ->onOneServer() //Solo se ejecute en un unico servidor
                ->withoutOverlapping()//no se ejecuta si ya ahi una instancia del mismo comando corriendo
                ->mondays();
        $schedule->command(SendEmailVerificationReminderCommand::class)
                ->onOneServer() //Solo se ejecute en un unico servidor        
                ->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
