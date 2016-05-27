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
    public function __construct($digits = '')
    {
        $this->setSequence($digits);
    }

    /**
     * Return the largest product from the series of digits
     * @param $span
     * @return int|number
     */
    public function largestProduct($span)
    {
        if (0 == $span) {
            return 1;
        }

        $this->validateSpan($span);

        return $this->largestSeriesProduct($span);

    }

    /**
     * Make sure the span is valid
     * @param int $span
     * @throws \InvalidArgumentException
     */
    private function validateSpan($span)
    {
        if ($span < 0) {
            throw new InvalidArgumentException(sprintf(
                '$span must be greater than or equal to 0. [%s] was given',
                $span
            ));
        }

        if ($span > $this->getSequenceLength()) {
            throw new InvalidArgumentException(sprintf(
                '$span can not be greater than the length of the sequence. $span:[%s], sequenceLength:[%s]',
                $span,
                $this->getSequenceLength()
            ));
        }
    }

    /**
     * @param $span
     * @return int|number
     */
    private function largestSeriesProduct($span)
    {
        $products = [];
        for ($start = 0; $start <= $this->getSequenceLength() - $span; $start++) {
            $products[] = $this->multiplyStringSection(substr($this->digitSequence, $start, $span));
        }
        return max($products);
    }


    /**
     * @param $stringSection
     * @return number
     */
    private function multiplyStringSection($stringSection)
    {
        return array_product(str_split($stringSection));
    }

    /**
     * @param string $digits
     */
    public function setSequence($digits)
    {
        $this->validateSequence($digits);

        $this->digitSequence = $digits;
        $this->sequenceLength = strlen($digits);
    }

    /**
     * @return int
     */
    public function getSequenceLength()
    {
        return $this->sequenceLength;
    }

    /**
     * @param $digits
     */
    private function validateSequence($digits)
    {
        if (! empty($digits) && ! is_numeric($digits)) {
            throw new InvalidArgumentException(sprintf(
                "Must supply a non-empty, numeric only sequence. [%] was given",
                $digits
            ));
        }
    }
}
