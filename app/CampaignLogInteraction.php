<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\CampaignLogInteraction
 *
 * @property-read mixed $id
 */
class CampaignLogInteraction extends Model
{
    protected $fillable = ['welcome', 'joined', 'requested', 'loaded', 'completed'];
    protected $collection = null;
    // relations

    // end relations
}
