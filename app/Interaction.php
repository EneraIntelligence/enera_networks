<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Interaction
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\Campaign[] $campaigns
 * @property-read mixed $id
 */
class Interaction extends Model
{
    protected $fillable = ['name', 'rules', 'status'];

    // relations
    public function campaigns()
    {
        return $this->hasMany('Networks\Campaign', 'interaction.id');
    }
    // end relations
}
