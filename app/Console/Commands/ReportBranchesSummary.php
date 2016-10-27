<?php

namespace Networks\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use MongoDate;
use Networks\Branch;
use Networks\ReportBranch;

class ReportBranchesSummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enera:BranchesSummary {--date=}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Summary on interactions on each branch';

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
        $this->comment('Executing command enera:BranchesSummary');

        //get optional date
        $dateString = $this->option('date');
        //todays date
        $today =  Carbon::today('America/Mexico_City');
        if($dateString)
        {
            //if date is set try to convert to carbon date
            $today = Carbon::createFromFormat('Y-m-d H', $dateString.' 00','America/Mexico_City');
        }
        $fromDate = $today->copy()->subDays(1);


        //transforms date to mongo date
        $mongo_today = new MongoDate(strtotime($today));

        $this->info("from: " . $fromDate);
        $this->info("to: " . $today);

        $branches = Branch::getBranchesId();

        foreach ($branches as $branch_id)
        {
            $report = ReportBranch::where('report_date',$mongo_today)
                ->where('branch_id',$branch_id)
                ->first();
            if(!$report)
            {
                $report = new ReportBranch();
                $report->report_date = $mongo_today;
            }
            $report->branch_id = $branch_id;
            $report->welcome = 0;
            $report->welcome_loaded = 0;
            $report->joined = 0;
            $report->requested = 0;
            $report->loaded = 0;
            $report->completed = 0;
            $report->accessed = 0;


            $report->devices = Branch::uniqueDevicesCount($today, $branch_id);
            $report->users = Branch::uniqueUsersCount($today, $branch_id);
            $todayLogs = Branch::dailyLogs($fromDate, $today, $branch_id);
//            $this->info($todayLogs);
            

            foreach($todayLogs as $log)
            {
                //dd($todayLogs);

                if($log['_id']['accessed'])
                {
                    $report->accessed += $log['count'];
                }
                else if($log['_id']['completed'])
                {
                    $report->completed += $log['count'];
                }
                else if($log['_id']['loaded'])
                {
                    $report->loaded += $log['count'];
                }
                else if($log['_id']['requested'])
                {
                    $report->requested += $log['count'];
                }
                else if($log['_id']['joined'])
                {
                    $report->joined += $log['count'];
                }
                else if($log['_id']['welcome_loaded'])
                {
                    $report->welcome_loaded += $log['count'];
                }else if($log['_id']['welcome'])
                {
                    $report->welcome += $log['count'];
                }

            }




            $this->info("branch " . $report->branch_id." done." );
            $this->info("welcome " . $report->welcome);
            $this->info("welcome_loaded " . $report->welcome_loaded);
            $this->info("joined " . $report->joined);
            $this->info("requested " . $report->requested);
            $this->info("loaded " . $report->loaded);
            $this->info("completed " . $report->completed);
            $this->info("accessed " . $report->accessed);
            $this->info("devices: " . $report->devices);
            $this->info("users: " . $report->users);
            $this->info("----------------------");
            $report->save();
        }

        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $this->comment('Finished executing command on '.$time.' seconds');
    }
}
