<?php

namespace Networks;

use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Model;
use MongoDate;

/**
 * Networks\Branche
 *
 * @property-read \Networks\Network $network
 * @property-read mixed $id
 */
class Branch extends Model
{
    protected $fillable = ['name', 'network_id', 'portal', 'aps', 'status'];

    // relations
    public function network()
    {
        return $this->belongsTo('Networks\Network');
    }

    public function campaign_logs()
    {
        return $this->hasMany('Networks\CampaignLog', 'device.branch_id');
    }

    public function summary()
    {
        return $this->hasMany('Networks\SummaryBranch');
    }

    public static function activeIds()
    {
        return DB::table('branches')->where('status', 'active')->pluck('_id');
    }

    public static function uniqueDevices($start_date, $end_date, $branch_id = null)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$gte' => new MongoDate(strtotime($start_date)),
                '$lt' => new MongoDate(strtotime($end_date))
            ],
        ];

        if ( isset($branch_id) )
        {
            $match['device.branch_id'] = $branch_id;
        }

        $devicesUnique = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$group' => [
                    '_id' => '$device.branch_id',
                    'devices' => [
                        '$addToSet' => '$device.mac',
                    ]
                ]
            ],
            [
                '$project' => [
                    '_id' => 1,
                    'count' => [
                        '$size' => '$devices'
                    ]
                ]
            ]
        ]);


        return $devicesUnique['result'];
    }


    


    public function count_devices()
    {

    }

    public static function dailyLogs($fromDate, $date, $branch_id)
    {
        $campaignLogs = DB::getMongoDB()->selectCollection('campaign_logs');

        $match = [
            'created_at' => [
                '$gte' => new MongoDate(strtotime($fromDate)),
                '$lt' => new MongoDate(strtotime($date))
            ],
            'device.branch_id'=>(string)$branch_id
        ];


//        $match['device.branch_id'] = $branch_id;
//        var_dump($branch_id);


        $devicesUnique = $campaignLogs->aggregate([
            [
                '$match' => $match
            ],
            [
                '$project'=>[
                    'interaction.welcome'=>[ '$ifNull'=>[ '$interaction.welcome',false ]],
                    'interaction.welcome_loaded'=>[ '$ifNull'=>[ '$interaction.welcome_loaded',false ]],
                    'interaction.joined'=>[ '$ifNull'=>[ '$interaction.joined',false ]],
                    'interaction.requested'=>[ '$ifNull'=>[ '$interaction.requested',false ]],
                    'interaction.loaded'=>[ '$ifNull'=>[ '$interaction.loaded',false ]],
                    'interaction.completed'=>[ '$ifNull'=>[ '$interaction.completed',false ]],
                    'interaction.accessed'=>[ '$ifNull'=>[ '$interaction.accessed',false ]]
                ]
            ],
            [
                '$group' => [
                    '_id' => [
                        'welcome'=> ['$ne'=>['$interaction.welcome',false ]],
                        'welcome_loaded'=> ['$ne'=>['$interaction.welcome_loaded',false ]],
                        'joined'=> ['$ne'=>['$interaction.joined',false ]],
                        'requested'=> ['$ne'=>['$interaction.requested',false ]],
                        'loaded'=> ['$ne'=>['$interaction.loaded',false ]],
                        'completed'=> ['$ne'=>['$interaction.completed',false ]],
                        'accessed'=> ['$ne'=>['$interaction.accessed',false ]],
                    ],
                    'count' => [
                        '$sum' => 1,
                    ]
                ]
            ]
        ]);

        /*
        if($devicesUnique['result']!=[])
            $devicesUnique['result']= $devicesUnique['result'][0];*/

        return $devicesUnique['result'];
    }

    public static function getBranchesId()
    {
        return DB::table('branches')->where('status','active')->pluck('_id');
    }
    
    // end relations
}
