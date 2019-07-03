<?php

class PhoneNumber
{
    private $number;

    public function __construct(string $number)
    {
        $this->number = $this->clean($number);
    }

    public function number() : string
    {
        return $this->number;
    }

    public function areaCode() : string
    {
        return substr($this->number, 0, 3);
    }

    public function prettyPrint(): string
    {
        return '(' . $this->areaCode() . ') ' . $this->prefix() . '-' . $this->lineNumber();
    }

    private function clean($number) : string
    {
        return $this->validate(preg_replace('/[^0-9a-z]+/i', '', $number));
    }

    private function validate($number) : string
    {
        if ($number !== preg_replace('/[^0-9]+/', '', $number)) {
            throw new InvalidArgumentException('Given number contains invalid characters.');
        }

        if (strlen($number) === 11) {
            $number = preg_replace('/^1/', '', $number);
        }

        if (strlen($number) !== 10) {
            throw new InvalidArgumentException('Given number has an invalid length.');
        }

        return $number;
    }

    private function prefix() : string
    {
        return substr($this->number, 3, 3);
    }

    private function lineNumber() : string
    {
        return substr($this->number, 6, 4);
    }
}
