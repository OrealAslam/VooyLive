<?php

namespace App\Console;

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
        Commands\firstReminder::class,
        Commands\secondReminder::class,
        Commands\plansUpdate::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        echo 'schedule run'.date("Y-m-d H:i:s").'<br>';
        // $schedule->command('inspire')
        //          ->hourly();
        /*
        $schedule->call(function () {
            DB::table('recent_users')->delete();
        })->daily();
        */
        // Scheduling Artisan Commands
        // $schedule->command('emails:send --force')->daily();
        // $schedule->command(EmailsCommand::class, ['--force'])->daily();
        // Scheduling Queued Jobs
        // $schedule->job(new Heartbeat)->everyFiveMinutes();
        // $schedule->job(new Heartbeat, 'heartbeats')->everyFiveMinutes();

        //$schedule->command('queue:work --daemon --queue=high,low')->everyMinute()->withoutOverlapping();
        /*
        $schedule->command('queue:restart')->everyFiveMinutes();
        $schedule->command('queue:work --daemon --queue=high,low')->everyTenMinutes()->withoutOverlapping();
        */
        //$schedule->command('queue:work --queue=high,low')->everyFiveMinutes()->withoutOverlapping();
        //$schedule->command('queue:work --queue=high,low')->everyMinute()->withoutOverlapping()->appendOutputTo(storage_path() . '/queue.log');
        //$schedule->command('queue:work --daemon --queue=high,low')->everyMinute()->withoutOverlapping()->appendOutputTo(storage_path() . '/queue.log');

        //$schedule->command('queue:work --queue=high,low --tries=3')->cron('* * * * * *')->withoutOverlapping()->appendOutputTo(storage_path() . '/queue.log');
        //$schedule->command('queue:work --queue=high,low')->cron('* * * * * *')->withoutOverlapping()->appendOutputTo(storage_path() . '/queue.log');;

        if (!strstr(shell_exec('ps xf'), 'php artisan queue:work')) {
            echo 'shell_exec';
            $schedule->command('queue:work --queue=high,low')
                     ->everyMinute();
        }


        $schedule->command('queue:restart')->everyFiveMinutes();
        $schedule->command('firstReminder:send')->dailyAt('22:00');
        $schedule->command('secondReminder:send')->dailyAt('22:15');


    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
