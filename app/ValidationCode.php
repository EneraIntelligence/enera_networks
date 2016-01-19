<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\ValidationCode
 *
 * @property-read mixed $id
 */
class ValidationCode extends Model
{
    protected $fillable = ['administrator_id', 'type', 'token'];
    //
}
