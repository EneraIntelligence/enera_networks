<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\CampaignLog
 *
 * @property-read \Networks\Campaign $campaign
 * @property-read \Networks\User $user
 * @property-read mixed $id
 */
class CampaignLog extends Model
{
    protected $fillable = ['user', 'device', 'interaction', 'cost'];

    // relations
    public function campaign()
    {
        return $this->belongsTo('Networks\Campaign');
    }

    public function interaction()
    {
        return $this->embedsOne('Networks\CampaignLogInteraction');
    }

    public function user() // presenta inconsistencia
    {
        return $this->belongsTo('Networks\User', 'user.id');
    }
    // end relations

    
    

}