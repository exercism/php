<?php

function brackets_match(string $input): bool
{
    $characters = str_split($input);

    $bracketsStack = array_reduce(
        $characters,
        function (array $stack, string $char): array {
            $isOpeningBracket = function ($char) {
                return in_array($char, ['[', '{', '(']);
            };

            $isClosingBracket = function ($char) {
                return in_array($char, [']', '}', ')']);
            };

            $matchesLastOpenBracket = function ($char, $stack) {
                $prev = array_pop($stack);

                $lookupOpeningBracket = [
                    ']' => '[',
                    '}' => '{',
                    ')' => '(',
                ];

                return $lookupOpeningBracket[$char] == $prev;
            };

            if ($isOpeningBracket($char)) {
                $stack[] = $char;
            }

            if ($isClosingBracket($char)) {
                if ($matchesLastOpenBracket($char, $stack)) {
                    array_pop($stack);
                } else {
                    $stack[] = $char; // unopened bracket
                }
            }
            return $stack;
        },
        []
    );

    return empty($bracketsStack);
}
