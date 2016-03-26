<?php

function from(\DateTime $from)
{
    $interval = new DateInterval("PT1000000000S");
    return $from->add($interval);
}
