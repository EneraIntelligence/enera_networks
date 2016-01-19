<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\AdministratorHistory
 *
 * @property-read mixed $id
 */
class AdministratorHistory extends Model
{
    protected $fillable = ['previous_status'];
    protected $table = null;
    protected $collection = null;
    // relations

    // end relations
}
