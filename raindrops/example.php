<?php

class Raindrops
{
    public static function convert($num)
    {
        if (!self::pling($num) && !self::plang($num) && !self::plong($num)) {
            return strval($num);
        }

        $ret = '';

        $ret .= self::pling($num) ? 'Pling' : '';
        $ret .= self::plang($num) ? 'Plang' : '';
        $ret .= self::plong($num) ? 'Plong' : '';

        return $ret;
    }

    public static function pling($num)
    {
        return (($num % 3) == 0);
    }

    public static function plang($num)
    {
        return (($num % 5) == 0);
    }

    public static function plong($num)
    {
        return (($num % 7) == 0);
    }
}
