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
                        'interaction.welcome' => ['$exists' => true],
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
                                'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$interaction.completed', 18000000]]
                            ]
                        ],
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
            ]);

            $IntDays = $this->dateRange(Carbon::today()->subDays($days + 1)->format('Y-m-d'), date('Y-m-d'));

            dd($completed_cnt['result']);

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

            dd($IntDays);

            return view('branches.show', [
                'branch' => $branch,
                'network' => Network::find(session('network_id')),
                'devices' => $devices['result'][0]['count'],
                'users' => $users['result'][0]['count'],
                'int_days' => $IntDays,
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

}
