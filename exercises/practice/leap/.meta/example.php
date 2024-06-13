<?php

declare(strict_types=1);

/**
 * @return bool
 */
function isLeap($year)
{
    return !($year % 4) && (!!($year % 100) || !($year % 400));
}
