<?php

namespace Networks\Console\Commands;

use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Console\Command;
use MongoDate;
use Networks\Branch;
use Networks\CampaignLog;
use Networks\Network;
use Networks\ReportDashboard;


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

        //get optional date
        $dateString = $this->option('date');
        //todays date
        $end_date = Carbon::today('America/Mexico_City');
        $today =  Carbon::today('America/Mexico_City');
        if($dateString)
        {
            //if date is set try to convert to carbon date
            $end_date = Carbon::createFromFormat('Y-m-d H', $dateString.' 00');
            $today = Carbon::createFromFormat('Y-m-d H', $dateString.' 00');
        }

        //substract 7 days to calculate week
        $start_date = $today->subDays(7);

        //transforms date to mongo date
        $mongo_today = new MongoDate(strtotime($end_date));

        $this->info("Date start: " . $start_date);
        $this->info("Date end: " . $end_date);
        
        $networks = Network::getNetworksId();
        
        foreach ($networks as $n_id)
        {
            $report = ReportDashboard::where('report_date',$mongo_today)
                ->where('network_id',$n_id)
                ->first();
            if(!$report)
            {
                $report = new ReportDashboard();
                $report->report_date = $mongo_today;
            }
            $report->network_id = $n_id;
            $report->devices = 0;
            $report->new = 0;
            $report->recurrent = 0;

            $unique = Network::uniqueDevices($start_date, $end_date, $n_id);
            //var_dump($unique);
            if($unique!=[])
            {
                $report->devices = $unique['count'];
                $recurrent = Network::recurrentDevices($start_date, $unique['devices'], $n_id);

                $report->recurrent = $recurrent['count'];
                $report->new = $report->devices - $report->recurrent;
            }
            
            $this->info("network: " . $report->network_id );
            $this->info('devices: '.$report->devices.' - new: '.$report->new.' - recurrent: '.$report->recurrent);
            $report->save();
        }
/*
        return;
        
        $uniqueDevices = Branch::uniqueDevices($start_date, $end_date);

        foreach ($uniqueDevices as $branchResult)
        {
            $this->info("branche: " . $branchResult['_id']." - count: ".$branchResult['count']);
        }
*/

        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $this->comment('Finished executing command on '.$time.' seconds');

    }

}
