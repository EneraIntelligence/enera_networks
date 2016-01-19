<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\AccessPoint
 *
 * @property-read \Networks\Branche $branche
 * @property-read \Networks\Network $network
 * @property-read mixed $id
 */
class AccessPoint extends Model
{
    protected $fillable = ['name', 'mac', 'serial_number', 'location', 'branch_id', 'network_id', 'historic', 'status'];

    // relations
    public function branche()
    {
        return $this->belongsTo('Networks\Branche');
    }

    public function network()
    {
        return $this->belongsTo('Networks\Network');
    }
    // end relations
}
