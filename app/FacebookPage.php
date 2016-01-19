<?php

namespace Networls;

use Jenssegers\Mongodb\Model;

/**
 * Networls\FacebookPage
 *
 * @property-read mixed $id
 */
class FacebookPage extends Model
{
    protected $fillable = ['name', 'category'];
    // relations

    // end relations
}
