<?php

require "run-length-encoding.php";

/**
 * Class RunLengthEncodingTest
 */
class RunLengthEncodingTest extends PHPUnit\Framework\TestCase
{
    /**
     * @var RunLengthEncoding
     */
    protected $rle;

    protected function setUp()
    {
        $this->rle = new RunLengthEncoding();
    }

    public function testEncodeEmptyString()
    {
        $this->assertEquals('', $this->rle->encode(''));
    }

    public function testEncodeSingleCharactersOnly()
    {
        $this->assertEquals('XYZ', $this->rle->encode('XYZ'));
    }

    public function testDecodeEmptyString()
    {
        $this->assertEquals('', $this->rle->decode(''));
    }

    public function testDecodeSingleCharactersOnly()
    {
        $this->assertEquals('XYZ', $this->rle->decode('XYZ'));
    }

    public function testEncodeSimple()
    {
        $this->assertEquals('2A3B4C', $this->rle->encode('AABBBCCCC'));
    }

    public function testDecodeSimple()
    {
        $this->assertEquals('AABBBCCCC', $this->rle->decode('2A3B4C'));
    }

    public function testEncodeWithSingleValues()
    {
        $this->assertEquals('12WB12W3B24WB', $this->rle->encode('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB'));
    }

    public function testDecodeWithSingleValues()
    {
        $this->assertEquals('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB', $this->rle->decode('12WB12W3B24WB'));
    }

    public function testDecodeMultipleWhitespaceMixedInString()
    {
        $this->assertEquals('  hsqq qww  ', $this->rle->decode('2 hs2q q2w2 '));
    }

    public function testEncodeDecodeCombination()
    {
        $this->assertEquals('zzz ZZ  zZ', $this->rle->decode($this->rle->encode('zzz ZZ  zZ')));
    }
}
