<?php

namespace Networks\Libraries;

class MathHelper
{

    /**
     * @param $actual
     * @param $last
     * @return float|int - increment percentage
     */
    public static function calculateIncrement($actual, $last)
    {
        $diff = $actual - $last;
        $increment = $diff != 0 && $last > 0 ? $diff / $last : 0;
        $result = $increment * 100;
        return $result;
    }
}