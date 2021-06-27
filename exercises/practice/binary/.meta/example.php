<?php

declare(strict_types=1);

/**
 * Converts binary value to a decimal.
 *
 * @param string $binary
 *
 * @return int
 */
function parse_binary($binary)
{
    $reversed = strrev($binary);

    for ($i = 0, $decimal = 0; $i < strlen($reversed); ++$i) {
        if ($reversed[$i] !== '0' && $reversed[$i] !== '1') {
            throw new InvalidArgumentException('Invalid binary string.');
        }

        $decimal += ((int) $reversed[$i]) * (2 ** $i);
    }

    return $decimal;
}
