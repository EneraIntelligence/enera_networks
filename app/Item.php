<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Item
 *
 * @property-read mixed $id
 */
class Item extends Model
{
    protected $fillable = ['campaign_id', 'filename', 'type', 'administrator_id'];
}
