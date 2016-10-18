<?php

namespace Networks;

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
        
        $match['device.branch_id'] = ['$in'=> $network_branches ];
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
                    'devices'=>1,
                    'count' => [
                        '$size' => '$devices'
                    ]
                ]
            ]
        ]);

        if($devicesUnique['result']!=[]) 
            $devicesUnique['result']= $devicesUnique['result'][0];

        return $devicesUnique['result'];
    }

    public static function recurrentDevices($before_date, $devices, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$lt' => new MongoDate(strtotime($before_date))
            ],
            'device.mac' =>[
                '$in'=>$devices
            ]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in'=> $network_branches ];
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
                    'devices'=>1,
                    'count' => [
                        '$size' => '$devices'
                    ]
                ]
            ]
        ]);

        if($recurrentDevices['result']!=[])
            $recurrentDevices['result']= $recurrentDevices['result'][0];

        return $recurrentDevices['result'];
    }

    public static function getNetworkBranchesId($network_id)
    {
        $ids = DB::table('branches')->where('network_id', (string)$network_id)->pluck('_id');

        //flatten array
        return array_map(function($element)
        {
            return (string) $element;
        },$ids);

    }


    public static function uniqueUsers($start_date, $end_date, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$gte' => new MongoDate(strtotime($start_date)),
                '$lt' => new MongoDate(strtotime($end_date))
            ],
            'user.id' => ['$exists'=>true]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in'=> $network_branches ];
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
                    'users'=>1,
                    'count' => [
                        '$size' => '$devices'
                    ]
                ]
            ]
        ]);

        if($usersUnique['result']!=[])
            $usersUnique['result']= $usersUnique['result'][0];

        return $usersUnique['result'];
    }

    public static function recurrentUsers($before_date, $users, $network_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$lt' => new MongoDate(strtotime($before_date))
            ],
            'user.id' =>[
                '$in'=>$users
            ]
        ];

        $network_branches = self::getNetworkBranchesId($network_id);

        $match['device.branch_id'] = ['$in'=> $network_branches ];
        //var_dump($network_branches);


        $recurrentUsers = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => $network_id,
                    'users' => [
                        '$addToSet' => 'user.id',
                    ]
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'users'=>1,
                    'count' => [
                        '$size' => '$users'
                    ]
                ]
            ]
        ]);

        if($recurrentUsers['result']!=[])
            $recurrentUsers['result']= $recurrentUsers['result'][0];

        return $recurrentUsers['result'];
    }

    public static function getNetworksId()
    {
        return DB::table('networks')->pluck('_id');
    }

}
