<?php

function meetup_day($year, $month, $which, $weekday)
{
    $monthName = DateTimeImmutable::createFromFormat("!m", $month)->format('F');
    if ($which != "teenth") {
        return new DateTimeImmutable("$which $weekday of $monthName $year");
    }

    $date = new DateTimeImmutable("first $weekday of $monthName $year");
    while ($date->format('F') == $monthName) {
        $date = $date->modify("next $weekday");
        if ($date->format('j') > 12) {
            return $date;
        }
    }
}
