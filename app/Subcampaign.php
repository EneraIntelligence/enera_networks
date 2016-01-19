<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Subcampaign
 *
 * @property-read \Networks\Administrator $administrator
 * @property-read mixed $id
 */
class Subcampaign extends Model
{
    protected $fillable = ['administrator_id', 'name', 'from', 'from_mail', 'campaign_id', 'subject', 'content'];

    // relations
    public function administrator()
    {
        return $this->belongsTo('Networks\Administrator');
    }
}
