<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Campaign
 *
 * @property-read \Networks\Administrator $administrator
 * @property-read \Networks\Interaction $interaction
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\CampaignLog[] $logs
 * @property-read mixed $id
 */
class Campaign extends Model
{
    protected $fillable = ['client_id', 'administrator_id', 'name', 'branches', 'interaction', 'filters', 'content', 'balance', 'status'];

    // relations
    public function administrator()
    {
        return $this->belongsTo('Networks\Administrator');
    }

    public function interaction()
    {
        return $this->belongsTo('Networks\Interaction', 'interaction.id');
    }

    public function logs()
    {
        return $this->hasMany('Networks\CampaignLog');
    }

    public function history()
    {
        return $this->embedsMany('Networks\CampaignHistory', 'history');
    }
    // end relations
}
