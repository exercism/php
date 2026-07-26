<?php

declare(strict_types=1);

function transmitSequence(array $sequence): array
{
    return array_map(
        fn ($eightBit) => sprintf('0x%02x', bindec($eightBit)),
        array_map(
            function ($sevenBit) {
                $sevenBit = str_pad($sevenBit, 7, '0');
                substr_count($sevenBit, "1") % 2 === 0 ? $parityBit = "0" : $parityBit = "1";
                return $sevenBit . $parityBit;
            },
            str_split(
                implode(
                    '',
                    array_map(
                        fn ($hex) => sprintf('%08b', hexdec($hex)),
                        $sequence
                    )
                ),
                7
            )
        )
    );
}

function decodeMessage(array $message): array
{
    return array_map(
        fn ($eightBit) => sprintf('0x%02x', bindec($eightBit)),
        array_filter(
            str_split(
                implode(
                    '',
                    array_map(
                        function ($eightBit) {
                            if (substr_count($eightBit, "1") % 2 === 0) {
                                return substr($eightBit, 0, 7);
                            } else {
                                throw new Exception("Error: wrong parity");
                            }
                        },
                        array_map(
                            fn ($hex) => sprintf('%08b', hexdec($hex)),
                            $message
                        )
                    )
                ),
                8
            ),
            function ($eightBit) {
                return strlen($eightBit) === 8;
            }
        )
    );
}
