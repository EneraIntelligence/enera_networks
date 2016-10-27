<?php

namespace Networks\Console\Commands;

use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use MongoDate;
use MongoId;
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


            /*
             * wordcloud start
             */
            //array with users ids from campaign logs
            $user_ids = $this->getUsersByBranch($branch_id);
            

            //array with pairs of pages ids and their count
            $likesCount = $this->getUsersLikesCounted($user_ids, 30);
            

            $wordcloud = [];

            //strip the array so it contains only pages ids
            $likes_ids = [];
            foreach ($likesCount as $k => $v) {
                $likes_ids[] = $v['_id'];
                $wordcloud[$v['_id']]=['count'=>$v['count']];
            }

            
            //array with pages names
            $words = $this->getPagesNames($likes_ids);

            

            foreach ($words as $word)
            {
                $wordcloud[$word['_id']]['name'] = $word['name'];
            }

            /*
            if($wordcloud!=[])
                dd($wordcloud);*/
            
            $report->wordcloud = $wordcloud;
            
            /*
             * wordcloud end
             */


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


    /*
     * Wordcloud helper functions
     */
    private function getUsersByBranch($branch_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $users = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => (string)$branch_id
                ]
            ],
            [
                '$group' => [
                    '_id' => 'none',
                    'ids' => ['$addToSet' => '$user.id']
                ]
            ]
        ]);

        $_ids = [];

        //conversion of string ids to MongoIds
        if (count($users['result']) > 0) {
            $userIdsArray = $users['result'][0]['ids'];

            foreach ($userIdsArray as $separateIds) {
                $_ids[] = $separateIds instanceof MongoId ? $separateIds : new MongoId($separateIds);
            }
        }

        return $_ids;

    }

    private function getUsersLikesCounted($user_ids, $limit)
    {
        $likes = DB::getMongoDB()->selectCollection('users')->aggregate([
            [
                '$match' => [
                    '_id' => ['$in' => $user_ids]
                ],
            ],
            [
                '$unwind' => '$facebook.likes'
            ],
            [
                '$group' => [
                    '_id' => '$facebook.likes',
                    'count' => ['$sum' => 1]
                ]
            ],
            [
                '$sort' => ['count' => -1]
            ],
            [
                '$limit' => $limit
            ]
        ]);

        //returns array with [_id=val,count=>val]
        return $likes['result'];
    }

    private function getPagesNames($pages_ids)
    {
        $FbColl = DB::getMongoDB()->selectCollection('facebook_pages');
        $pages_cursor = $FbColl->aggregate([
            [
                '$match' => [
                    'id' => ['$in' => $pages_ids]
                ]
            ],
            [
                '$project' => [
                    '_id' => '$id',
                    'name' => 1
                ]
            ]
        ]);

        return $pages_cursor['result'];

    }
}
