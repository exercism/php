<?php

class Gigasecond
{
    public static function from(\DateTime $from)
    {
        $interval = new DateInterval("PT1000000000S");

        return $from->add($interval);
    }
}
