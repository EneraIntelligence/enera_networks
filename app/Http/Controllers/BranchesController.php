<?php

namespace Networks\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

use MongoDate;
use Networks\Branche;

use Networks\CampaignLog;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\Network;
use MongoId;

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
        dd($network->branches()->lists(['_id']));
        return view('branches.index', [
            'network' => $network,
            'logs' => CampaignLog::whereIn('device.branch_id', $network->branches()->get(['_id']))->count(),
            'branches' => $network->branches,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $branch = Branche::find($id);
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
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.welcome', 18000000]]
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
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.joined', 18000000]]
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
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.requested', 18000000]]
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
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.loaded', 18000000]]
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
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.created_at', 18000000]]
                            ]
                        ],
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
            ]);

            $IntDays = $this->dateRange(Carbon::today()->subDays($days)->format('Y-m-d'), date('Y-m-d'));

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
            $user_ids = $this->getUsersBybranches( [$id] );
            //dd($_ids);

            //array with pairs of pages ids and their count
            $likesCount = $this->getUsersLikesCounted($user_ids, 30);
            //dd($likes);

            //strip the array so it contains only pages ids
            $likes_ids = [];
            foreach($likesCount as $k=>$v){
                $likes_ids[] = $v['_id'];
            }
            //array with pages names
            $words = $this->getPagesNames($likes_ids);
            /*
             * wordcloud
             */

            return view('branches.show', [
                'branch' => $branch,
                'network' => Network::find(session('network_id')),
                'devices' => $devices['result'][0]['count'],
                'users' => $users['result'][0]['count'],
                'int_days' => $IntDays,
                'words'=>$words,
                'wordCount'=>$likesCount,
            ]);
        } else {
            return redirect()->route('branches::index')->with([
                'n_type' => 'danger',
                'n_timeout' => 5000,
                'n_msg' => 'Nodo no encontrado.'
            ]);
        }
    }

    private function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d')
    {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while ($current <= $last) {
            if (date($format, $current) != '') {
                $dates[date($format, $current)] = [
                    'welcome' => 0,
                    'joined' => 0,
                    'requested' => 0,
                    'loaded' => 0,
                    'completed' => 0,
                ];
                $current = strtotime($step, $current);
            }
        }

        return $dates;
    }

    /*
     * Wordcloud helper functions
     */
    private function getUsersByBranches($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $users = $cLogsColl->aggregate([
            [
                '$match'=>[
                    'device.branch_id'=>['$in'=>$branches_id]
                ]
            ],
            [
                '$group' => [
                    '_id'=>'none',
                    'ids'=>['$addToSet'=>'$user.id']
                ]
            ]
        ]);

        $_ids=[];


        //conversion of string ids to MongoIds
        if(count($users['result'])>0)
        {
            $userIdsArray = $users['result'][0]['ids'];

            foreach($userIdsArray as $separateIds){
                $_ids[] = $separateIds instanceof MongoId ? $separateIds : new MongoId($separateIds);
            }
        }

        return $_ids;

    }

    private function getUsersLikesCounted($user_ids, $limit)
    {
        $likes = DB::getMongoDB()->selectCollection('users')->aggregate([
            [
                '$match'=>[
                    '_id'=>['$in'=>$user_ids]
                ],
            ],
            [
                '$unwind'=>'$facebook.likes'
            ],
            [
                '$group' => [
                    '_id'=>'$facebook.likes',
                    'count'=>['$sum'=>1]
                ]
            ],
            [
                '$sort'=>['count'=>-1]
            ],
            [
                '$limit'=>$limit
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
                '$match'=>[
                    'id'=>['$in'=>$pages_ids]
                ]
            ],
            [
                '$project'=>[
                    '_id'=>'$id',
                    'name'=>1
                ]
            ]
        ]);

        return $pages_cursor['result'];

    }


}
