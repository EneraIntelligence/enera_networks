<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Network
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\Branche[] $branches
 * @property-read mixed $id
 */
class Network extends Model
{
    protected $fillable = ['name', 'type', 'main', 'status'];

    // relations
    public function branches()
    {
        return $this->hasMany('Networks\Branche');
    }
    // end relations
}
