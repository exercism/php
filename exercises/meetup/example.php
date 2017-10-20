<?php

use DateTime;

function meetup_day($year, $month, $which, $weekday)
{
    $monthName = (DateTime::createFromFormat("!m", $month))->format('F');
    if ($which != "teenth") {
        return new DateTime("$which $weekday of $monthName $year");
    }

    $date = new DateTime("first $weekday of $monthName $year");
    while ($date->format('F') == $monthName) {
        $date->modify("next $weekday");
        if ($date->format('j') > 12) {
            return $date;
        }
    }
}
