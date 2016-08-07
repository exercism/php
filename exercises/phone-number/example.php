<?php

class PhoneNumber
{
    public function __construct($number)
    {
        $this->number = $this->clean($number);
    }
  
    public function number()
    {
        return $this->number;
    }
  
    public function areaCode()
    {
        return substr($this->number, 0, 3);
    }
  
    protected function prefix()
    {
        return substr($this->number, 3, 3);
    }
  
    protected function lineNumber()
    {
        return substr($this->number, 6, 4);
    }
  
    public function prettyPrint()
    {
        return '(' . $this->areaCode() . ') ' . $this->prefix() . '-' . $this->lineNumber();
    }
  
    protected function clean($number)
    {
        return $this->validate(preg_replace('/[^0-9a-z]+/i', '', $number));
    }
  
    protected function validate($number)
    {
        if ($number != preg_replace('/[^0-9]+/', '', $number)) {
            throw new InvalidArgumentException();
        }
  
        if (strlen($number) == 11) {
            $number = preg_replace('/^1/', '', $number);
        }
  
        if (strlen($number) != 10) {
            throw new InvalidArgumentException();
        }
  
        return $number;
    }
}
