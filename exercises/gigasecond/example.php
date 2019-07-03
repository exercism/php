<?php

function from(DateTime $from)
{
    $interval = new DateInterval('PT1000000000S');
    $date = clone $from;
    return $date->add($interval);
}
