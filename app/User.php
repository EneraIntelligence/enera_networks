<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\User
 *
 * @property-read mixed $id
 */
class User extends Model
{
    protected $fillable = ['facebook'];

    // relations
    public function facebook()
    {
        return $this->embedsOne('Networks\UserFacebook');
    }
    // end relations
}
