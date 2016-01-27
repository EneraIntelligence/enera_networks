<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Branche
 *
 * @property-read \Networks\Network $network
 * @property-read mixed $id
 */
class Branche extends Model
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
    // end relations
}
