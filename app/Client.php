<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Client
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\Administrator[] $administrators
 * @property-read mixed $id
 */
class Client extends Model
{
    protected $fillable = ['name', 'billing_information'];

    // relations
    public function administrators()
    {
        return $this->hasMany('Networks\Administrator');
    }

    public function networks()
    {
        return $this->hasMany('Networks\Network');
    }
    // end relations

}
