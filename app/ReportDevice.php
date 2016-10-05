<?php

namespace Networks;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model;

class ReportDevice extends Model
{
    protected $fillable = ['active','date','network_id', 'branches'];

    //
}
