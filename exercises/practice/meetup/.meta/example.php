<?php

declare(strict_types=1);

function meetup_day(int $year, int $month, string $which, string $weekday): DateTimeImmutable
{
    $monthName = DateTimeImmutable::createFromFormat("!m", "$month")->format('F');
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
