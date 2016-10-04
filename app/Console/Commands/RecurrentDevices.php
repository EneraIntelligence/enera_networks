<?php

namespace Networks\Console\Commands;

use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Console\Command;
use MongoDate;
use Networks\Branch;
use Networks\CampaignLog;


class RecurrentDevices extends Command
{
    private $campaignLogs;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enera:RecurrentDevices {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes summary of the date indicated';

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
        $time_start = microtime(true);
        $this->comment('Executing command enera:RecurrentDevices');


        $start_date = Carbon::yesterday('America/Mexico_City');
        $end_date = Carbon::today('America/Mexico_City');

//        $start_date = Carbon::today('America/Vancouver');
//        $end_date = Carbon::tomorrow('America/Vancouver');

        $this->info("Date start: " . $start_date);
        $this->info("Date end: " . $end_date);

        
        $uniqueDevices = Branch::uniqueDevices($start_date, $end_date);

        foreach ($uniqueDevices as $branchResult)
        {
            $this->info("branche: " . $branchResult['_id']." - count: ".$branchResult['count']);
        }


        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $this->comment('Finished executing command on '.$time.' seconds');

    }

}
