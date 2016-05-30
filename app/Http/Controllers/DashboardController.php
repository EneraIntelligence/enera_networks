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
use Networks\Branche;

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

        //*/
        $network = Network::find(session('network_id'));
        $branches = Branche::where('network_id', $network->_id)->where('status', '<>', 'filed')->lists("name", "_id");
        $campaigns = Campaign::where('administrator_id', auth()->user()->_id)->where('status', 'active')->orderBy('name', 'desc')->take(3)->get();
        $devices = 0;
        $camData = "{}";
        $camData = json_decode($camData);
        foreach ($campaigns as $cam) {

            $end = new DateTime(date('d-m-Y', $cam->filters['date']['end']->sec));
            $start = new DateTime(date('d-m-Y', $cam->filters['date']['start']->sec));
            $differ = $start->diff($end);
            $daysCampaign = $differ->format('%a');
            if ($end > new DateTime()) {
                $restCampaign = $end->diff(new DateTime());
                $missingDays = $restCampaign->format('%a');
                $percentage = round(($missingDays * 100) / $daysCampaign, 0);
                $camData->{$cam->_id} = ['percentage' => $percentage, 'daysCampaign' => $daysCampaign, 'missingDays' => $missingDays, 'name' => $cam->name, 'type' => $cam->interaction['name'], '_id' => $cam->id];
            } else {
                $camData->{$cam->_id} = ['percentage' => '100', 'daysCampaign' => $daysCampaign, 'missingDays' => 0, 'name' => $cam->name, 'type' => $cam->interaction['name'], '_id' => $cam->id];
            }

        }
        json_encode($camData);


        $isMobile = $agent->isMobile();
        $user = User::count();
        $access = CampaignLog::whereIn('device.branch_id', $network->branches)->get();
        $dashboard = compact('devices', 'campaigns', 'branches', 'network', 'user', 'access', 'camData', 'isMobile');

        return view('dashboard.index', $dashboard);
        /*/
        $branches = Branche::where('network_id', session('network_id'))->where('status','active')->get();
        $branches_ids = [];
        foreach ($branches as $branch) {
            $branches_ids[] = $branch->_id;
        }

        $branches = Network::find(session('network_id'))->branches;

        $days=8;


        $uniqueUsersDays = $this->dateRange(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600', date('Y-m-d') . 'T00:00:00-0600');
        $list = $this->getUniqueUsersLastDays($branches_ids,$days);
        //dd($list);

        $uniqueUsersList = [];
        foreach ($list['unique'] as $key => $users) {
            if (array_key_exists($key, $uniqueUsersDays))
            {
                $uniqueUsersDays[$key]['num'] = count( $users );
                $uniqueUsersList[$key] = $users;
            }
        }
        foreach ($list['recurrent'] as $key => $users) {
            if (array_key_exists($key, $uniqueUsersDays))
            {
                $uniqueUsersDays[$key]['rec'] =  count( $users );
            }
        }

        //dd($uniqueUsersList);

        $uniqueDevicesDay = $this->dateRange(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600', date('Y-m-d') . 'T00:00:00-0600');
        $uniqueDList = $this->getUniqueDevicesLastDays($branches_ids,$days);
        foreach ($uniqueDList as $key => $value) {
            if (array_key_exists($key, $uniqueDevicesDay))
            {
                $uniqueDevicesDay[$key]['num'] = $value;
            }
        }
        //dd($uniqueDevicesDay);

        $accessedDays = $this->dateRange(Carbon::today()->subDays($days)->format('Y-m-d') . 'T00:00:00-0600', date('Y-m-d') . 'T00:00:00-0600');
        $accessedList = $this->getAccessedLastDays($branches_ids,$days);
        //dd($accessedList);
        //dd($uniqueUsersList);


        foreach ($accessedList as $acc) {
            $uniqueCount=0;
            if (array_key_exists($acc['_id'], $uniqueUsersList))
            {
                //count recurrent users
                $usersCount = array_count_values($acc['users']);

                foreach ($uniqueUsersList[$acc['_id']] as $userId)
                {
                    if (array_key_exists($userId, $usersCount))
                    {
                        $uniqueCount+=$usersCount[$userId];
                    }
                }


            }
            $accessedDays[$acc['_id']]['num']= $acc['num'];
            $accessedDays[$acc['_id']]['new']= $uniqueCount;
            $accessedDays[$acc['_id']]['rec']= $acc['num']-$uniqueCount;
        }

        //dd($accessedDays);

        $devices = $this->getUniqueDevices($branches_ids);
        $joined = $this->getUniqueUsers($branches_ids);
        $completed = $this->getAccessed($branches_ids);


        return view('dashboard.index_old', [
            'user' => Auth::user(),
            'devices' => $devices,
            'joined' => $joined,
            'completed' => $completed,
            'branches' => $branches,
            'accessed_list'=>$accessedDays,
            'users_list'=>$uniqueUsersDays,
            'devices_list'=>$uniqueDevicesDay
        ]);
        
        //*/
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
