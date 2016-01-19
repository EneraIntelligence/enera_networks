<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Zone
 *
 * @property-read \Networks\Network $network
 * @property-read mixed $id
 */
class Zone extends Model
{
    protected $fillable = ['name', 'aps', 'network_id', 'zones'];

    // relations
    public function network()
    {
        return $this->belongsTo('Networks\Network');
    }

    public function zones()
    {
        return $this->embedsMany('Networks\ZoneZone');
    }
    // end relations
}
