<?php

require "run-length-encoding.php";

/**
 * Class RunLengthEncodingTest
 */
class RunLengthEncodingTest extends PHPUnit\Framework\TestCase
{
    public function testEncodeEmptyString()
    {
        $this->assertEquals('', encode(''));
    }

    public function testEncodeSingleCharactersOnly()
    {
        $this->assertEquals('XYZ', encode('XYZ'));
    }

    public function testDecodeEmptyString()
    {
        $this->assertEquals('', decode(''));
    }

    public function testDecodeSingleCharactersOnly()
    {
        $this->assertEquals('XYZ', decode('XYZ'));
    }

    public function testEncodeSimple()
    {
        $this->assertEquals('2A3B4C', encode('AABBBCCCC'));
    }

    public function testDecodeSimple()
    {
        $this->assertEquals('AABBBCCCC', decode('2A3B4C'));
    }

    public function testEncodeWithSingleValues()
    {
        $this->assertEquals(
            '12WB12W3B24WB',
            encode('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB')
        );
    }

    public function testDecodeWithSingleValues()
    {
        $this->assertEquals(
            'WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB',
            decode('12WB12W3B24WB')
        );
    }

    public function testDecodeMultipleWhitespaceMixedInString()
    {
        $this->assertEquals('  hsqq qww  ', decode('2 hs2q q2w2 '));
    }

    public function testEncodeDecodeCombination()
    {
        $this->assertEquals('zzz ZZ  zZ', decode(encode('zzz ZZ  zZ')));
    }
}
