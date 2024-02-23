<?php

declare(strict_types=1);

class RotationalCipher
{
    public function rotate(string $text, int $shift): string
    {
        return implode('', array_map(static function ($c) use ($shift) {
            $isUpper = preg_match('/[A-Z]/', $c);
            $isAlpha = preg_match('/[a-z]/i', $c);
            $charShift = $isUpper ? ord('A') : ord('a');

            if ($isAlpha) {
                $shiftedCharCode = (ord($c) - $charShift + $shift) % 26 + $charShift;
                return chr($shiftedCharCode);
            }

            return $c;
        }, str_split($text)));
    }
}
