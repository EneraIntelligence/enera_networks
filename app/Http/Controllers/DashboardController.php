<?php

namespace Networks\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use DB;
use Networks\Network;
use Networks\Branche;

use MongoDate;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branche::where('network_id', session('network_id'))->get();
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
        $accessedList = $this->getAccessedLastDays($branches_ids,$days,$uniqueUsersList);
        foreach ($accessedList as $acc) {
            $uniqueCount=0;
            if (array_key_exists($acc['_id'], $uniqueUsersList))
            {
                //count recurrent user$s
                $usersCount = array_count_values($acc['users']);
                //dd($usersCount);

                foreach ($uniqueUsersList[$acc['_id']] as $userId)
                {
                    if (array_key_exists($userId, $usersCount))
                    {
                        $uniqueCount+=$usersCount[$userId];
                    }
                }


            }
            $accessedDays[$acc['_id']]['num']= $acc['num'];
            $accessedDays[$acc['_id']]['new']= $acc['num']-$uniqueCount;
            $accessedDays[$acc['_id']]['rec']= $uniqueCount;
        }

        //dd($accessedDays);

        $devices = $this->getUniqueDevices($branches_ids);
        $joined = $this->getUniqueUsers($branches_ids);
        $completed = $this->getAccessed($branches_ids);


        return view('dashboard.index', [
            'user' => Auth::user(),
            'devices' => $devices,
            'joined' => $joined,
            'completed' => $completed,
            'branches' => $branches,
            'accessed_list'=>$accessedDays,
            'users_list'=>$uniqueUsersDays,
            'devices_list'=>$uniqueDevicesDay
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
        $userIds=[];
        foreach($users['result'] as $res)
        {
            array_push($userIds,$res['_id']);
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
                '$unwind'=>'$dates'
            ],
            [
                '$sort' =>
                [
                    'dates'=>1
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

        $unique=[];
        $recurrent=[];
        foreach($logs['result'] as $res)
        {
            for($i=0;$i< count($res['dates']); $i++)
            {
                //add the unique user when it was acquired
                if($i==0)
                {
                    if (array_key_exists($res['dates'][0], $unique)) {

//                        $unique[ $res['dates'][0] ]+=1;
                        $unique[ $res['dates'][0] ][]=$res['_id'];
                    }
                    else
                    {
//                        $unique[ $res['dates'][0] ]=1;
                        $unique[ $res['dates'][0] ]= [ $res['_id'] ];
                    }
                }
                else
                {
                    if (array_key_exists($res['dates'][$i], $recurrent)) {

//                        $recurrent[ $res['dates'][$i] ]+=1;
                        $recurrent[ $res['dates'][$i] ][]=$res['_id'];
                    }
                    else
                    {
//                        $recurrent[ $res['dates'][$i] ]=1;
                        $recurrent[ $res['dates'][$i] ]= [ $res['_id'] ];
                    }
                }

            }

        }
        //dd( $count );


        return array('recurrent'=>$recurrent,'unique'=>$unique);

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
        $userIds=[];
        foreach($users['result'] as $res)
        {
            array_push($userIds,$res['_id']);
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
                '$unwind'=>'$dates'
            ],
            [
                '$sort' =>
                    [
                        'dates'=>1
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

        $count=[];
        foreach($logs['result'] as $res)
        {
            if (array_key_exists($res['dates'][0], $count)) {

                $count[ $res['dates'][0] ]+=1;
            }
            else
            {
                $count[ $res['dates'][0] ]=1;
            }
        }
        //dd( $count );

        return isset($count) ? $count : [];

    }

    private function getAccessedLastDays($branches_id,$numDays)
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
                    'users'=>[
                        '$push'=>'$user.id'
                    ]
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
                $dates[date($format, $current)] = ['num'=>0, 'new'=>0, 'rec'=>0];
                $current = strtotime($step, $current);
            }
        }

        return $dates;
    }


}
