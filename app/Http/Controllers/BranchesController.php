<?php

namespace Networks\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

use MongoDate;
use Networks\AccessPoint;
use Networks\Branch;

use Networks\Campaign;
use Networks\CampaignLog;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\Network;
use MongoId;
use Networks\ReportBranch;
use Networks\SummaryBranch;
use Networks\SummaryNetwork;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param $network
     */
    public function index()
    {
        $network = Network::find(session('network_id'));
        $branches = Branch::where('network_id', $network->_id)->where('status', '<>', 'filed')->get();
        
        $navData= array();
        $navData['branches']='active';
        $navData['breadcrumbs']=['Nodos'];

        return view('branches.index', [
            'network' => $network,
            'navData' => $navData,
            'branches' => $branches,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $branch = Branch::find($id);


        if ($branch && $branch->network_id == session('network_id')) {


            $days=7;
            $interactionsReport = ReportBranch::getInteractions($days, $id);
            //dd($interactionsReport[0]->devices);

            if ($interactionsReport == []) {
                $devices = $interactionsReport[0]->devices;
                $users = $interactionsReport[0]->users;
                $wordcloud = $interactionsReport[0]->wordcloud;
            } else {
                $devices = 0;
                $users = 0;
                $wordcloud = [];
            }
            
            $aps = AccessPoint::WhereIn('mac', $branch->aps)->get();

            $summary_branch = SummaryBranch::where('branch_id', $id)->orderBy('date', 'desc')->first();

            $edad_total = 0;

            if ($summary_branch){
                foreach ($summary_branch->accumulated['users']['demographic']['male'] as $key => $male){
                    $edad_total +=  $key * $male;
                }

                foreach ($summary_branch->accumulated['users']['demographic']['female'] as $key => $female){
                    $edad_total +=  $key * $female;
                }
            }

            $edad_promedio = isset($summary_branch) ? $edad_total/$summary_branch->accumulated['users']['total'] : 0;
            
//            dd($summary_branch->accumulated['users']);

            $navData= array();
            $navData['branches']='active';
            $navData['breadcrumbs']=['branches', $branch->name];

            return view('branches.show', [
                'branch' => $branch,
                'summary_branch' => $summary_branch,
                'aps' => $aps,
                'total_users' => $summary_branch ? $summary_branch->accumulated['users']['total'] : 0,
                'edad_promedio' => $edad_promedio,
                'genero' => $summary_branch ? array_sum($summary_branch->accumulated['users']['demographic']['male']) > array_sum($summary_branch->accumulated['users']['demographic']['female']) ? 'Hombres' : 'Mujeres' : '---',
                'network' => Network::find(session('network_id')),
                'devices' => $devices,
                'users' => $users,
                'interactions_by_day' => $interactionsReport,
                'wordcloud' => $wordcloud,
                'navData' => $navData,
                'wlogs' => $branch->campaign_logs()
                    ->where(function ($q) {
                        $q->where('interaction.completed', 'exists', true)
                            ->orWhere('interaction.accessed', 'exists', true);
                    })->count(),
            ]);
        } else {
            return redirect()->route('branches::index')->with([
                'n_type' => 'danger',
                'n_timeout' => 5000,
                'n_msg' => 'Nodo no encontrado.'
            ]);
        }
    }

    public function clients($id)
    {
        $branch = Branch::find($id);
        if ($branch && $branch->network_id == session('network_id')) {
            $devices = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        'device.mac' => ['$exists' => true],
                        'device.branch_id' => $branch->_id
                    ]
                ],
                [
                    '$group' => [
                        '_id' => '',
                        'mac' => [
                            '$addToSet' => '$device.mac'
                        ]
                    ]
                ],
                ['$unwind' => '$mac'],
                [
                    '$group' => [
                        '_id' => '$_id',
                        'count' => ['$sum' => 1]
                    ]
                ],
            ]);
            $users = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        'user.id' => ['$exists' => true],
                        'device.branch_id' => $branch->_id
                    ]
                ],
                [
                    '$group' => [
                        '_id' => '',
                        'fb_id' => [
                            '$addToSet' => '$user.id'
                        ]
                    ]
                ],
                ['$unwind' => '$fb_id'],
                [
                    '$group' => [
                        '_id' => '$_id',
                        'count' => ['$sum' => 1]
                    ]
                ],
            ]);

            $days = 8;
            $welcome_cnt = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        // interacciones
                        'interaction.welcome_loaded' => ['$exists' => true],
                        'interaction.joined' => ['$exists' => false],
                        'interaction.requested' => ['$exists' => false],
                        'interaction.loaded' => ['$exists' => false],
                        'interaction.completed' => ['$exists' => false],
                        //
                        'device.branch_id' => $branch->_id,
                        'created_at' => [
                            '$gte' => new MongoDate(strtotime(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600')),
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.welcome', 21600000]]
                            ]
                        ],
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
            ]);
            $joined_cnt = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        // interacciones
                        //'interaction.welcome' => ['$exists' => false],
                        'interaction.joined' => ['$exists' => true],
                        'interaction.requested' => ['$exists' => false],
                        'interaction.loaded' => ['$exists' => false],
                        'interaction.completed' => ['$exists' => false],
                        //
                        'device.branch_id' => $branch->_id,
                        'created_at' => [
                            '$gte' => new MongoDate(strtotime(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600')),
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.joined', 21600000]]
                            ]
                        ],
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
            ]);
            $requested_cnt = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        // interacciones
                        //'interaction.welcome' => ['$exists' => false],
                        //'interaction.joined' => ['$exists' => false],
                        'interaction.requested' => ['$exists' => true],
                        'interaction.loaded' => ['$exists' => false],
                        'interaction.completed' => ['$exists' => false],
                        'interaction.accessed' => ['$exists' => false],
                        //
                        'device.branch_id' => $branch->_id,
                        'created_at' => [
                            '$gte' => new MongoDate(strtotime(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600')),
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.requested', 21600000]]
                            ]
                        ],
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
            ]);
            $loaded_cnt = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        // interacciones
                        //'interaction.welcome' => ['$exists' => false],
                        //'interaction.joined' => ['$exists' => false],
                        //'interaction.requested' => ['$exists' => false],
                        'interaction.loaded' => ['$exists' => true],
                        'interaction.completed' => ['$exists' => false],
                        'interaction.accessed' => ['$exists' => false],
                        //
                        'device.branch_id' => $branch->_id,
                        'created_at' => [
                            '$gte' => new MongoDate(strtotime(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600')),
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.loaded', 21600000]]
                            ]
                        ],
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
            ]);
            $completed_cnt = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        // interacciones
                        //'interaction.welcome' => ['$exists' => false],
                        //'interaction.joined' => ['$exists' => false],
                        //'interaction.requested' => ['$exists' => false],
                        //'interaction.loaded' => ['$exists' => false],
                        '$or' => [
                            ['interaction.completed' => ['$exists' => true]],
                            ['interaction.accessed' => ['$exists' => true]],
                        ],
                        //
                        'device.branch_id' => $branch->_id,
                        'created_at' => [
                            '$gte' => new MongoDate(strtotime(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600')),
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.created_at', 21600000]]
                            ]
                        ],
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
            ]);

            $IntDays = $this->dateRange(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600', date('Y-m-d') . 'T00:00:00-0600');

            foreach ($welcome_cnt['result'] as $welcome) {
                $IntDays[$welcome['_id']]['welcome'] += $welcome['count'];
            }
            foreach ($joined_cnt['result'] as $joined) {
                $IntDays[$joined['_id']]['joined'] += $joined['count'];
            }
            foreach ($requested_cnt['result'] as $requested) {
                $IntDays[$requested['_id']]['requested'] += $requested['count'];
            }
            foreach ($loaded_cnt['result'] as $loaded) {
                $IntDays[$loaded['_id']]['loaded'] += $loaded['count'];
            }
            foreach ($completed_cnt['result'] as $completed) {
                $IntDays[$completed['_id']]['completed'] += $completed['count'];
            }

            /*
             * wordcloud
             */

            //array with users ids from campaign logs
            $user_ids = $this->getUsersBybranches([$id]);
            //dd($_ids);

            //array with pairs of pages ids and their count
            $likesCount = $this->getUsersLikesCounted($user_ids, 30);
            //dd($likes);

            //strip the array so it contains only pages ids
            $likes_ids = [];
            foreach ($likesCount as $k => $v) {
                $likes_ids[] = $v['_id'];
            }
            //array with pages names
            $words = $this->getPagesNames($likes_ids);
            /*
             * wordcloud
             */

            return view('branches.list', [
                'branch' => $branch,
                'network' => Network::find(session('network_id')),
                'devices' => $devices['result'][0]['count'],
                'users' => $users['result'][0]['count'],
                'int_days' => $IntDays,
                'words' => $words,
                'wordCount' => $likesCount,
            ]);
        } else {
            return redirect()->route('branches::index')->with([
                'n_type' => 'danger',
                'n_timeout' => 5000,
                'n_msg' => 'Nodo no encontrado.'
            ]);
        }
    }


}
