<?php

function from(DateTimeImmutable $from)
{
    $interval = new DateInterval('PT1000000000S');
    return $from->add($interval);
}
