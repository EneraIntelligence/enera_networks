<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Device
 *
 * @property-read mixed $id
 */
class Device extends Model
{
    protected $fillable = ['mac', 'os', 'manufacture', 'frecuency'];
    // relations

    // end relations
}
