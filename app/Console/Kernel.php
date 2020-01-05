<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Services\ImportService as ImportService;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       #########import cron
       $schedule->call(function(){

            echo '=======import players started=======';
            echo "\n";

            $impServ = new ImportService(new \App\Repositories\PlayersRepository);
            $impServ = $impServ->importPlayer();

            echo "total players imported: ".$impServ['total']."\n";
            echo "status: ".$impServ['status']."\n";
            echo "message: ".$impServ['message']."\n";
            echo "=======import players ended==========";

       })->everyMinute();
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
