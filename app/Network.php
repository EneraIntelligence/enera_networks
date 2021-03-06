<?php

namespace Networks;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Model;
use MongoDate;

/**
 * Networks\Network
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\Branche[] $branches
 * @property-read mixed $id
 */
class Network extends Model
{
    protected $fillable = ['name', 'type', 'main', 'status'];


    // relations
    public function branches()
    {
        return $this->hasMany('Networks\Branche');
    }

    public function summary()
    {
        return $this->hasMany('Networks\SummaryNetwork');
    }

    // end relations


    public static function uniqueDevices($start_date, $end_date, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$gte' => new MongoDate(strtotime($start_date)),
                '$lt' => new MongoDate(strtotime($end_date))
            ]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in' => $network_branches];
        //var_dump($network_branches);


        $devicesUnique = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => $network_id,
                    'devices' => [
                        '$addToSet' => '$device.mac',
                    ]
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'devices' => 1,
                    'count' => [
                        '$size' => '$devices'
                    ]
                ]
            ]
        ]);

        if ($devicesUnique['result'] != [])
            $devicesUnique['result'] = $devicesUnique['result'][0];

        return $devicesUnique['result'];
    }

    public static function access($start_date, $end_date, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$gte' => new MongoDate(strtotime($start_date)),
                '$lt' => new MongoDate(strtotime($end_date))
            ],
            'interaction.accessed' => ['$exists' => true]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in' => $network_branches];
        //var_dump($network_branches);


        $access = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => $network_id,
                    'count' => [
                        '$sum' => 1,
                    ]
                ]
            ]
        ]);

        if ($access['result'] != [])
            $access['result'] = $access['result'][0];

        return $access['result'];
    }

    public static function recurrentDevices($before_date, $devices, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$lt' => new MongoDate(strtotime($before_date))
            ],
            'device.mac' => [
                '$in' => $devices
            ]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in' => $network_branches];
        //var_dump($network_branches);


        $recurrentDevices = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => $network_id,
                    'devices' => [
                        '$addToSet' => '$device.mac',
                    ]
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'devices' => 1,
                    'count' => [
                        '$size' => '$devices'
                    ]
                ]
            ]
        ]);

        if ($recurrentDevices['result'] != [])
            $recurrentDevices['result'] = $recurrentDevices['result'][0];

        return $recurrentDevices['result'];
    }

    public static function getNetworkBranchesId($network_id)
    {
        $ids = DB::table('branches')->where('network_id', (string)$network_id)->pluck('_id');

        //flatten array
        return array_map(function ($element) {
            return (string)$element;
        }, $ids);

    }


    public static function uniqueUsers($start_date, $end_date, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$gte' => new MongoDate(strtotime($start_date)),
                '$lt' => new MongoDate(strtotime($end_date))
            ],
            'user.id' => ['$exists' => true]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in' => $network_branches];
        //var_dump($network_branches);


        $usersUnique = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => $network_id,
                    'users' => [
                        '$addToSet' => '$user.id',
                    ]
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'users' => 1,
                    'count' => [
                        '$size' => '$users'
                    ]
                ]
            ]
        ]);

        if ($usersUnique['result'] != [])
            $usersUnique['result'] = $usersUnique['result'][0];

        return $usersUnique['result'];
    }

    public static function recurrentUsers($before_date, $users, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$lt' => new MongoDate(strtotime($before_date))
            ],
            'user.id' => [
                '$in' => $users
            ]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in' => $network_branches];
        //var_dump($network_branches);


        $recurrentUsers = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => $network_id,
                    'users' => [
                        '$addToSet' => '$user.id',
                    ]
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'users' => 1,
                    'count' => [
                        '$size' => '$users'
                    ]
                ]
            ]
        ]);

        if ($recurrentUsers['result'] != [])
            $recurrentUsers['result'] = $recurrentUsers['result'][0];

        return $recurrentUsers['result'];
    }

    public static function matureUsers($before_date, $users, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$lt' => new MongoDate(strtotime($before_date))
            ],
            'user.id' => [
                '$in' => $users
            ]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in' => $network_branches];
        //var_dump($network_branches);


        $recurrentUsers = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => [
                        'network_id' => $network_id,
                        'user_id' => '$user.id'
                    ],
                    'count' => ['$sum' => 1],
                ]
            ],
            [
                '$match' => [
                    'count' => ['$gte' => 9]
                ]
            ],
            [
                '$group' => [
                    '_id' => '$_id.network_id',
                    'users' => [
                        '$addToSet' => '$_id.user_id',
                    ]
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'users' => 1,
                    'count' => [
                        '$size' => '$users'
                    ]
                ]
            ]
        ]);

        if ($recurrentUsers['result'] != [])
            $recurrentUsers['result'] = $recurrentUsers['result'][0];

        return $recurrentUsers['result'];
    }

    public static function getNetworksId()
    {
        return DB::table('networks')->pluck('_id');
    }

    public static function interactionPerDay($network_id, $time, $branch)
    {
        $last_date = self::lastCampaignLog($branch);
        $date = count($last_date) == 0 ? Carbon::today('America/Mexico_City') : Carbon::parse(date('Y-m-d', $last_date[0]['created_at']->sec));
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');
        $network_branches = $branch == 'All' ? self::getNetworkBranchesId($network_id) : [$branch];
        $startDate = $date->subDays($time);
        $mongoStartDate = new MongoDate(strtotime($startDate));

        if ($time != 'All') {
            $match = [
                'device.branch_id' => [
                    '$in' => $network_branches
                ],
                'interaction.accessed' => ['$exists' => true],
                'created_at' => [
                    '$lte' => $date,
                    '$gte' => $mongoStartDate
                ]
            ];
        } else {
            $match = [
                'device.branch_id' => [
                    '$in' => $network_branches
                ],
                'interaction.accessed' => ['$exists' => true],
            ];

        }


        $for_weekday = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$project' => [
                    'day' => ['$dayOfWeek' => ['$subtract' => ['$created_at', 6 * 60 * 60 * 1000]]],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$day',
                    'count' => ['$sum' => 1]
                ]
            ],
            ['$sort' => ['_id' => 1]]
        ]);


        $chart_weekday = ['data1', 0, 0, 0, 0, 0, 0, 0];
        foreach ($for_weekday['result'] as $weekday) {
            $chart_weekday[$weekday['_id']] = $weekday['count'];
        }

        return $chart_weekday;
    }

    public static function interactionPerHour($network_id, $time, $branch)
    {
        $last_date = self::lastCampaignLog($branch);
        $date = count($last_date) == 0 ? Carbon::today('America/Mexico_City') : Carbon::parse(date('Y-m-d', $last_date[0]['created_at']->sec));
        $lastRegister = New MongoDate(strtotime($date));
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');
        $network_branches = $branch == 'All' ? self::getNetworkBranchesId($network_id) : [$branch];

        $startDate = $date->subDays($time);
        $firstRegister = New MongoDate(strtotime($startDate));
        if ($time != 'All') {
            $match = [
                'device.branch_id' => [
                    '$in' => $network_branches
                ],
                'interaction.accessed' => ['$exists' => true],
                'created_at' => [
                    '$lte' => $lastRegister,
                    '$gte' => $firstRegister
                ]
            ];
        } else {
            $match = [
                'device.branch_id' => [
                    '$in' => $network_branches
                ],
                'interaction.accessed' => ['$exists' => true],
            ];

        }


        $for_hour = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$project' => [
                    'hour' => ['$hour' => ['$subtract' => ['$created_at', 6 * 60 * 60 * 1000]]],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$hour',
                    'count' => ['$sum' => 1]
                ]
            ],
            ['$sort' => ['_id' => 1]]
        ]);

        $chart_hour = ['data1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($for_hour['result'] as $hour) {
            $chart_hour[$hour['_id'] + 1] = $hour['count'];
        }

        return $chart_hour;
    }

    public static function os($network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');
        $network_branches = self::getNetworkBranchesId($network_id);

        $for_os = $campaignLogs->aggregate([
            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $network_branches
                    ],
                    'interaction.accessed' => ['$exists' => true]

                ]
            ],
            [
                '$group' => [
                    '_id' => '$device.os',
                    'count' => ['$sum' => 1]
                ]
            ],
            ['$sort' => ['count' => -1]]
        ]);

        return $for_os;
    }

    public static function deviceRecurrence($network_id)
    {

        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');
        $network_branches = self::getNetworkBranchesId($network_id);
        $recurrencia = $campaignLogs->aggregate([

            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $network_branches
                    ],
                    'interaction.accessed' => ['$exists' => true]

                ]
            ],
            [
                '$group' => [
                    '_id' => '$device.mac',
                    'count' => ['$sum' => 1]
                ]
            ]
        ]);


        return $recurrencia;
    }

    public static function lastCampaignLog($branch_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');
        $last = $campaignLogs->aggregate([

            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => [$branch_id]
                    ],
                    'interaction.accessed' => ['$exists' => true]

                ]
            ],
            ['$sort' => ['count' => -1]],
            ['$limit' => 1]

        ]);

        return $last['result'];
    }

}
