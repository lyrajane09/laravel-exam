<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ImportService as ImportService;

class ImportPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import players from API to the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        #########import cron
        echo '=======import players started========';
        echo "\n";

        ##call the import service for the codes
        $impServ = new ImportService();
        $impServ = $impServ->importPlayer();

        echo "|| Total players imported: ".$impServ['total']."     ||"."\n";
        echo "|| Status: ".$impServ['status']."                     ||"."\n";
        echo "|| Message: ".$impServ['message']."  ||"."\n";
        echo "=======import players ended==========";

    }
}
