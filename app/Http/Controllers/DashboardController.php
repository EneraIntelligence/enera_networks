<?php

namespace Networks\Http\Controllers;

use Auth;
use DateTime;
use Illuminate\Http\Request;

use Networks\Campaign;
use Networks\CampaignLog;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use DB;
use Networks\Network;
use Networks\Branch;

use MongoDate;
use Carbon\Carbon;
use Networks\SummaryNetwork;
use Networks\User;

use Jenssegers\Agent\Agent;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = new Agent();

        $navData = array();
        $navData['home'] = 'active';

        $network = Network::find(session('network_id'));
        $branches = Branch::where('network_id', session('network_id'))->where('status', '<>', 'filed')->take(3)->get();
        $campaigns = Campaign::where('administrator_id', auth()->user()->_id)->orderBy('name', 'desc')->take(3)->get();

        $summary_network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->first();
        $w2 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(7)->first();
        $w3 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(14)->first();
        $m2 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(30)->first();

        $male = isset($summary_network->accumulated['users']['demographic']['male']) ? $summary_network->accumulated['users']['demographic']['male'] : [];
        $female = isset($summary_network->accumulated['users']['demographic']['female']) ? $summary_network->accumulated['users']['demographic']['female'] : [];


//        dd($w2->network->branches);
        $diff_accumulated = $summary_network && $w2 && $summary_network->accumulated['connections'] - $w2->accumulated['connections'] != 0 ? $summary_network->accumulated['connections'] - $w2->accumulated['connections'] : 0;

        $access_diff = $w2 && $w3 && ($w2->accumulated['connections'] - $w3->accumulated['connections']) != 0 ?
            100 * ((($summary_network->accumulated['connections'] - $w2->accumulated['connections'])
                    - ($w2->accumulated['connections'] - $w3->accumulated['connections']))
                / ($w2->accumulated['connections'] - $w3->accumulated['connections'])) : 0;
        
        //TODO hacer más bonito la agrupación de edades
        $m = ["Hombres",0,0,0,0,0];
        foreach ($male as $key => $ma){
            if ($key >= 0  && $key <= 17)
            {
                $m[1] += $ma * -1;
            }else if($key >= 18  && $key <= 34){
                $m[2] += $ma * -1;
            }
            else if($key >= 35  && $key <= 45){
                $m[3] += $ma * -1;
            }
            else if($key >= 46  && $key <= 60){
                $m[4] += $ma * -1;
            }else{
                $m[5] += $ma *-1;
            }
        }

        $f = ["Mujeres",0,0,0,0,0];
        foreach ($female as $key => $fe){
            if ($key >= 0  && $key <= 17)
            {
                $f[1] += $fe;
            }else if($key >= 18  && $key <= 34){
                $f[2] += $fe;
            }
            else if($key >= 35  && $key <= 45){
                $f[3] += $fe;
            }
            else if($key >= 46  && $key <= 60){
                $f[4] += $fe;
            }
            else{
                $f[5] += $fe;
            }
        }


//        $a = array_reduce($male, function ($carry, $item){
//            $carry += $item;
//            return $carry;
//        });

//        $b = array_reduce($female, function ($carry, $item){
//            $carry += $item;
//            return $carry;
//        });

        $users_diff = $w2 && $w3 && ($w2->accumulated['users']['total'] - $w3->accumulated['users']['total']) != 0 ?
            100 * ((($summary_network->accumulated['users']['total'] - $w2->accumulated['users']['total'])
                    - ($w2->accumulated['users']['total'] - $w3->accumulated['users']['total']))
                / ($w2->accumulated['users']['total'] - $w3->accumulated['users']['total'])) : 0;

        $devices_diff_week = $summary_network && $w2 && (($summary_network->accumulated['devices']['total'] - $w2->accumulated['devices']['total'])
            - ($w3->accumulated['devices']['total'] - $w2->accumulated['devices']['total'])) > 0 ? true : false;

        return view('dashboard.index', [
            'network' => $network,
            'branches' => $branches,
            'campaigns' => $campaigns,
            'users_male' => $m,
            'users_female' => $f,
            'summary_users' => [
                'accumulated' => $summary_network ? $summary_network->accumulated['users']['total'] : 0,
                'male' => $summary_network ? array_sum($summary_network->accumulated['users']['demographic']['male']) : 0,
                'female' => $summary_network ? array_sum($summary_network->accumulated['users']['demographic']['female']) : 0,
                'diff' => $users_diff,
                'tw' => $summary_network ? ($summary_network->accumulated['users']['total'] - $w2->accumulated['users']['total']) : 0,
            ],
            'summary_devices' => [
                'accumulated' => $summary_network ? $summary_network->accumulated['devices']['total'] : 0,
                'diff_week' => $devices_diff_week,
                'tw' => $summary_network && $w2 ? ($summary_network->accumulated['devices']['total'] - $w2->accumulated['devices']['total']) : 0,
                'tm' => $summary_network && $m2 ? ($summary_network->accumulated['devices']['total'] - $m2->accumulated['devices']['total']) : 0,
            ],
            'summary_access' => [
                'accumulated' => $summary_network ? $summary_network->accumulated['connections'] : 0,
                'diff_accumulated' => $diff_accumulated,
                'access_diff' => $access_diff,
                'plus1' => $summary_network ? $summary_network->accumulated['connections'] - $w2->accumulated['connections'] : 0,
                'plus2' => $summary_network ? $summary_network->accumulated['connections'] - $m2->accumulated['connections'] : 0
            ],
            'isMobile' => $agent->isMobile(),
            'navData' => $navData
        ]);

    }

    
    private function getUniqueDevices($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id]
                ]
            ],
            [
                '$group' => [
                    '_id' => '',
                    'devices' => [
                        '$addToSet' => '$device.mac',
                    ]
                ]
            ],
            ['$unwind' => '$devices'],
            [
                '$group' => [
                    '_id' => '$_id',
                    'count' => ['$sum' => 1]
                ]
            ],
        ]);

        return isset($devices['result'][0]['count']) ? $devices['result'][0]['count'] : 0;

    }

    private function getUniqueUsers($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id],
                    'user.id' => ['$exists' => true]
                ]
            ],
            [
                '$group' => [
                    '_id' => '',
                    'users' => [
                        '$addToSet' => '$user.id',
                    ]
                ]
            ],
            ['$unwind' => '$users'],
            [
                '$group' => [
                    '_id' => '$_id',
                    'count' => ['$sum' => 1]
                ]
            ],
        ]);

        return isset($devices['result'][0]['count']) ? $devices['result'][0]['count'] : 0;

    }

    private function getAccessed($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id],
                    'interaction.accessed' => ['$exists' => true]
                ]
            ],
            [
                '$group' => [
                    '_id' => '',
                    'count' => ['$sum' => 1],
                ]
            ]
        ]);

        return isset($devices['result'][0]['count']) ? $devices['result'][0]['count'] : 0;


    }

    private function getUniqueUsersLastDays($branches_id, $numDays)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $users = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id],
                    'user.id' => ['$exists' => true],
                    'created_at' => [
                        '$gt' => new MongoDate(strtotime(Carbon::today()->subDays($numDays)->format('Y-m-d') . 'T00:00:00-0600')),
                    ],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$user.id'
                ]
            ]
        ]);

        //dd( $users['result'] );
        $userIds = [];
        foreach ($users['result'] as $res) {
            array_push($userIds, $res['_id']);
        }
//        dd($userIds);

        $logs = $cLogsColl->aggregate([
            [
                '$match' => [
                    'user.id' => ['$in' => $userIds],
                    'device.branch_id' => ['$in' => $branches_id]
                ]
            ],
            [
                '$group' => [
                    '_id' => '$user.id',
                    'dates' => [
                        '$addToSet' => ['$dateToString' => [
                            'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$created_at', 21600000]]
                        ]
                        ]

                    ]
                ]
            ],
            [
                '$unwind' => '$dates'
            ],
            [
                '$sort' =>
                    [
                        'dates' => 1
                    ]
            ],
            [
                '$group' => [
                    '_id' => '$_id',
                    'dates' => [
                        '$push' => '$dates',
                    ]
                ]
            ],

        ]);

        //dd($logs);

        $unique = [];
        $recurrent = [];
        foreach ($logs['result'] as $res) {
            for ($i = 0; $i < count($res['dates']); $i++) {
                //add the unique user when it was acquired
                if ($i == 0) {
                    if (array_key_exists($res['dates'][0], $unique)) {

//                        $unique[ $res['dates'][0] ]+=1;
                        $unique[$res['dates'][0]][] = $res['_id'];
                    } else {
//                        $unique[ $res['dates'][0] ]=1;
                        $unique[$res['dates'][0]] = [$res['_id']];
                    }
                } else {
                    if (array_key_exists($res['dates'][$i], $recurrent)) {

//                        $recurrent[ $res['dates'][$i] ]+=1;
                        $recurrent[$res['dates'][$i]][] = $res['_id'];
                    } else {
//                        $recurrent[ $res['dates'][$i] ]=1;
                        $recurrent[$res['dates'][$i]] = [$res['_id']];
                    }
                }

            }

        }
        //dd( $count );


        return array('recurrent' => $recurrent, 'unique' => $unique);

    }

    private function getUniqueDevicesLastDays($branches_id, $numDays)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $users = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id],
                    'device.mac' => ['$exists' => true],
                    'created_at' => [
                        '$gt' => new MongoDate(strtotime(Carbon::today()->subDays($numDays)->format('Y-m-d') . 'T00:00:00-0600')),
                    ],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$device.mac'
                ]
            ]
        ]);

        //dd( $users['result'] );
        $userIds = [];
        foreach ($users['result'] as $res) {
            array_push($userIds, $res['_id']);
        }
//        dd($userIds);

        $logs = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.mac' => ['$in' => $userIds],
                    'device.branch_id' => ['$in' => $branches_id]
                ]
            ],
            [
                '$group' => [
                    '_id' => '$device.mac',
                    'dates' => [
                        '$addToSet' => ['$dateToString' => [
                            'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$created_at', 21600000]]
                        ]
                        ]

                    ]
                ]
            ],
            [
                '$unwind' => '$dates'
            ],
            [
                '$sort' =>
                    [
                        'dates' => 1
                    ]
            ],
            [
                '$group' => [
                    '_id' => '$_id',
                    'dates' => [
                        '$push' => '$dates',
                    ]
                ]
            ],

        ]);

        $count = [];
        foreach ($logs['result'] as $res) {
            if (array_key_exists($res['dates'][0], $count)) {

                $count[$res['dates'][0]] += 1;
            } else {
                $count[$res['dates'][0]] = 1;
            }
        }
        //dd( $count );

        return isset($count) ? $count : [];

    }

    private function getAccessedLastDays($branches_id, $numDays)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        $devices = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id],
                    'interaction.accessed' => ['$exists' => true],
                    'created_at' => [
                        '$gt' => new MongoDate(strtotime(Carbon::today()->subDays($numDays)->format('Y-m-d') . 'T00:00:00-0600')),
                    ],
                ]
            ],
            [
                '$group' => [
                    '_id' => [
                        '$dateToString' => [
                            'format' => '%Y-%m-%d', 'date' => ['$subtract' => ['$created_at', 21600000]]
                        ],
                    ],
                    'num' => [
                        '$sum' => 1
                    ],
                    'users' => [
                        '$push' => '$user.id'
                    ]
                ]
            ],
            [
                '$sort' => [
                    "_id" => 1
                ]
            ]
        ]);

        //dd($devices['result']);


        return $devices['result'];


    }

    private function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d')
    {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while ($current <= $last) {
            if (date($format, $current) != '') {
                $dates[date($format, $current)] = ['num' => 0, 'new' => 0, 'rec' => 0];
                $current = strtotime($step, $current);
            }
        }

        return $dates;
    }

    public function terms()
    {
        return view('dashboard.terms', [
            'user' => Auth::user(),
            'hideTermsFooter' => true
        ]);
    }

}
