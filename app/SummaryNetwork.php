<?php

namespace Networks;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model;

class SummaryNetwork extends Model
{
    //Relaciones
    public function network(){
        return $this->belongsTo('Networks\Network');
    }

    //Fin de relaciones
}
