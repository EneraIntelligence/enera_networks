<?php

namespace Networks\Console\Commands;


use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use Networks\Branch;
use Networks\CampaignLog;
use DB;
use Networks\ReportDevice;

class ActiveDevices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enera:ActiveDevices  {--date=} {--network=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        ini_set('memory_limit', '256M');
        
        $date = new Carbon($this->option('date'),'America/Vancouver');
        $star_date = new Carbon($this->option('date'),'America/Vancouver');
        $star_date = $star_date->subDays(7);
        $branches = Branch::where('network_id', $this->option('network'))->lists('_id');
        $branches = json_decode(json_encode($branches), true);
        
        $logs = CampaignLog::
        where('created_at', '<', $date)
            ->where('created_at', '>=', $star_date)
            ->whereIn('device.branch_id', $branches)
            ->count();
        
        $branches_count = [];
//        $branches_count = json_decode($branches_count);
        foreach ($branches as $branch){
            $count = CampaignLog::
            where('created_at', '<', $date)
                ->where('created_at', '>=', $star_date)
                ->where('device.branch_id', $branch)
                ->count();
            $devices = CampaignLog::
                whereIn('device.branch_id', $branches)
                ->count();

            
            $branches_count[] = array('branch_id'=>$branch,'count'=>$count);
        }
        
        
        ReportDevice::create([
            'active' => $logs,
            'date' => $date->format('Y-m-d'),
            'network_id' => $this->option('network'),
            'branches' => $branches_count
        ]);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $this->comment('Finished executing command on '.$time.' seconds');
    }
}
