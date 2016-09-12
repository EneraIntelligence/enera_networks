<?php

namespace Networks;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model;

class SummaryCampaign extends Model
{
    //Relaciones
    public function campaign()
    {
        return $this->belongsTo('Networks\Campaign');
    }

    //Fin de relaciones
}
