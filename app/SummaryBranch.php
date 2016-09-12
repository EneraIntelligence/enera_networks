<?php

namespace Networks;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model;

class SummaryBranch extends Model
{
    public function branch()
    {
        return $this->belongsTo('Networks\Branche');
    }
}
