<?php

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
    public function largestProduct($span) : int
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
    private function validateSpan($span) : void
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
    private function largestSeriesProduct($span) : int
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
    private function multiplyStringSection($stringSection) : int
    {
        return array_product(str_split($stringSection));
    }

    /**
     * Validate the given sequence
     *
     * @param $digits
     * @throws InvalidArgumentException
     */
    private function validateSequence($digits) : void
    {
        if (! empty($digits) && ! is_numeric($digits)) {
            throw new InvalidArgumentException(sprintf(
                "Must supply a non-empty, numeric only sequence. [%s] was given",
                $digits
            ));
        }
    }
}
