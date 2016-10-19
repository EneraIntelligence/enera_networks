<?php

namespace Networks\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use MongoDate;
use Networks\Network;
use Networks\ReportWeekly;

class WeeklyAccessReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enera:WeeklyAccess';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates resports for recurrent and new acccesses weekly';

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
        $this->comment('Executing command enera:WeeklyAccess');
        $time_start = microtime(true);

        $first = Carbon::createFromFormat('Y-m-d H', '2016-02-29 00', 'America/Mexico_City');
        $last = Carbon::createFromFormat('Y-m-d H', '2016-10-24 00' ,'America/Mexico_City');

        $day = $first;
        $mondays = [];

        while ($day < $last) {
            array_push($mondays,$day->copy());
            $day->addDays(7);
        };

        
        foreach ($mondays as $end_date)
        {
            $start_date = $end_date->copy()->subDays(7);

            //transforms date to mongo date
            $report_date = new MongoDate(strtotime($end_date));

            $this->info("Report date: " . $start_date." - ". $end_date);

            $networks = Network::getNetworksId();

            foreach ($networks as $n_id)
            {
                $report = ReportWeekly::where('report_date',$report_date)
                    ->where('network_id',$n_id)
                    ->first();
                if(!$report)
                {
                    $report = new ReportWeekly();
                    $report->report_date = $report_date;
                }
                $report->network_id = $n_id;
                $report->users = 0;
                $report->new = 0;
                $report->recurrent = 0;
                $report->mature = 0;

                $unique = Network::uniqueUsers($start_date, $end_date, $n_id);
                //var_dump($unique);
                if($unique!=[])
                {
                    $report->users = $unique['count'];
                    $recurrent = Network::recurrentUsers($start_date, $unique['users'], $n_id);

                    if($recurrent!=[])
                    {
                        $report->recurrent = $recurrent['count'];

                        $mature = Network::matureUsers($start_date, $recurrent['users'], $n_id);

                        if($mature!=[])
                        {
                            $report->mature = $mature['count'];
                            $report->recurrent = $report->recurrent-$report->mature;

                        }
                        
                    }

                    
                    
                    
                    $report->new = $report->users - $report->recurrent - $report->mature;
                }

                $this->info("network: " . $report->network_id );
                $this->info('users: '.$report->users.' - new: '.$report->new.' - recurrent: '.$report->recurrent.' - mature: '.$report->mature);
                $report->save();
            }

        }


        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $this->comment('Finished executing command on '.$time.' seconds');

    }
}
