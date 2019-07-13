<?php

function from(DateTimeImmutable $from)
{
    $interval = new DateInterval('PT1000000000S');
    $date = clone $from;
    return $date->add($interval);
}
