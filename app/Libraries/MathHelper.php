<?php

namespace Networks\Libraries;

class MathHelper
{
    public static function calculateIncrement($actual, $last)
    {
        $diff = $actual - $last;
        $increment = $diff > 0 && $last > 0 ? $diff / $last : 0;
        $result = $increment * 100;
        return $result;
    }
}