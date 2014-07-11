<?php
namespace Exercism\Trinary;

class Trinary
{
    const BASE = 3;

    protected $digits;

    public function __construct($decimal = '')
    {
        $this->digits = array_map('intval', array_reverse(str_split($decimal)));
    }

    public function toDecimal()
    {
        list($decimal) = array_reduce($this->digits, [$this, 'accumulator'], [0, 0]);
        return is_int($decimal) ? $decimal : 0;
    }

    public function accumulator($decimal, $digit)
    {
        list($out, $index) = $decimal;

        $out += $digit * pow(self::BASE, $index);

        return [$out, ++$index];
    }
}
