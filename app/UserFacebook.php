<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\UserFacebook
 *
 * @property-read mixed $id
 */
class UserFacebook extends Model
{
    protected $fillable = ['name', 'birthday', 'email', 'location', 'gender', 'likes', 'id'];
    protected $collection = null;

    // relations

    // end relations
}
