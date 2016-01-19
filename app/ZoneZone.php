<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\ZoneZone
 *
 * @property-read mixed $id
 */
class ZoneZone extends Model
{
    protected $fillable = ['name', 'aps', 'zone'];
    protected $collection = null;

    // relations
    public function zones()
    {
        return $this->embedsMany('Networks\ZoneZone');
    }
    // end relations
}
