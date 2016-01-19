<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\CampaignHistory
 *
 * @property-read mixed $id
 */
class CampaignHistory extends Model
{
    protected $fillable = ['administrator_id', 'status', 'date', 'note'];
    protected $collection = null;
    protected $dates = ['date'];
    // relations

    // end relations
}
