<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Role
 *
 * @property-read \Networks\Client $client
 * @property-read mixed $id
 */
class Role extends Model
{
    protected $fillable = ['name', 'platform', 'permissions', 'client_id'];

    // relations
    public function client()
    {
        return $this->belongsTo('Networks\Client');
    }
    // end relations
}
