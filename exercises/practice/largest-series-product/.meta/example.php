<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Series
{
    /**
     * The the digits to test
     *
     * @var string
     */
    private $digitSequence;

    /**
     * The length of digits
     *
     * @var int
     */
    private $sequenceLength;

    /**
     * Series constructor.
     *
     * @param string $digits
     */
    public function __construct($digits)
    {
        $this->validateSequence($digits);

        $this->digitSequence = $digits;
        $this->sequenceLength = strlen($digits);
    }

    /**
     * Return the largest product from the series of digits
     *
     * @param int $span
     * @return int
     */
    public function largestProduct($span): int
    {
        if (0 == $span) {
            return 1;
        }

        $this->validateSpan($span);

        return $this->largestSeriesProduct($span);
    }

    /**
     * Make sure the span is valid
     *
     * @param int $span
     * @throws InvalidArgumentException
     */
    private function validateSpan($span): void
    {
        if ($span < 0) {
            throw new InvalidArgumentException(sprintf(
                '$span must be greater than or equal to 0. [%s] was given',
                $span
            ));
        }

        if ($span > $this->sequenceLength) {
            throw new InvalidArgumentException(sprintf(
                '$span can not be greater than the length of the sequence. $span:[%s], sequenceLength:[%s]',
                $span,
                $this->sequenceLength
            ));
        }
    }

    /**
     * Returns the largest product of a string of digits of length $span
     *
     * @param int $span
     * @return int
     */
    private function largestSeriesProduct($span): int
    {
        $products = [];
        for ($start = 0; $start <= $this->sequenceLength - $span; $start++) {
            $products[] = $this->multiplyStringSection(substr($this->digitSequence, $start, $span));
        }
        return max($products);
    }

    /**
     * Multiplies a numerical string section
     *
     * @param string $stringSection
     * @return int
     */
    private function multiplyStringSection($stringSection): int
    {
        return array_product(str_split($stringSection));
    }

    /**
     * Validate the given sequence
     *
     * @param $digits
     * @throws InvalidArgumentException
     */
    private function validateSequence($digits): void
    {
        if (!empty($digits) && !is_numeric($digits)) {
            throw new InvalidArgumentException(sprintf(
                "Must supply a non-empty, numeric only sequence. [%s] was given",
                $digits
            ));
        }
    }
}
