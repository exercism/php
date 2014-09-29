<?php

class Roman
{
    protected static $mapping = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    public static function toRoman($num)
    {
        $ret = '';

        foreach (self::$mapping as $arabic => $roman) {
            while ($num >= $arabic) {
                $ret .= $roman;
                $num -= $arabic;
            }
        }

        return $ret;
    }
}
