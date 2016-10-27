<?php

namespace Networks;

use Carbon\Carbon;
use Jenssegers\Mongodb\Model;
use MongoDate;
use MongoId;


class ReportBranch extends Model
{
    //

    public static function getInteractions($days, $id)
    {
        $today = Carbon::today('America/Mexico_City');
        $mongoToday = new MongoDate(strtotime($today));

        $startDate = Carbon::today('America/Mexico_City')->subDays($days);
        $mongoStartDate = new MongoDate(strtotime($startDate));

        return self::getReport($mongoStartDate, $mongoToday,$id);
    }

    private static function getReport($start_date, $end_date, $branch_id)
    {
        return self::where('branch_id', new MongoId($branch_id) )
            ->where('report_date', '>=', $start_date)
            ->where('report_date', '<=', $end_date)->get();
    }
}
