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
            ]
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
    // end relations
}
