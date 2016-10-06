<?php

namespace Networks;

use Carbon\Carbon;
use Jenssegers\Mongodb\Model;
use MongoDate;
use MongoId;


class ReportDashboard extends Model
{

    public static function today($n_id)
    {
        $today = Carbon::today('America/Mexico_City');
        $mongoToday = new MongoDate(strtotime($today));
        return self::getReport($mongoToday,$n_id);
    }

    public static function weekBefore($n_id)
    {
        $weekBefore = Carbon::today('America/Mexico_City')->subDays(7);;
        $mongoWeekBefore = new MongoDate(strtotime($weekBefore));
        return self::getReport($mongoWeekBefore,$n_id);
    }

    private static function getReport($date, $network_id)
    {
        return self::where('network_id', new MongoId($network_id) )->where('report_date',$date)->first();
    }
}
