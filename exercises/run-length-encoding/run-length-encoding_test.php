<?php

class RunLengthEncodingTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'run-length-encoding.php';
    }

    public function testEncodeEmptyString() : void
    {
        $this->assertEquals('', encode(''));
    }

    public function testEncodeSingleCharactersOnly() : void
    {
        $this->assertEquals('XYZ', encode('XYZ'));
    }

    public function testDecodeEmptyString() : void
    {
        $this->assertEquals('', decode(''));
    }

    public function testDecodeSingleCharactersOnly() : void
    {
        $this->assertEquals('XYZ', decode('XYZ'));
    }

    public function testEncodeSimple() : void
    {
        $this->assertEquals('2A3B4C', encode('AABBBCCCC'));
    }

    public function testDecodeSimple() : void
    {
        $this->assertEquals('AABBBCCCC', decode('2A3B4C'));
    }

    public function testEncodeWithSingleValues() : void
    {
        $this->assertEquals(
            '12WB12W3B24WB',
            encode('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB')
        );
    }

    public function testDecodeWithSingleValues() : void
    {
        $this->assertEquals(
            'WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB',
            decode('12WB12W3B24WB')
        );
    }

    public function testDecodeMultipleWhitespaceMixedInString() : void
    {
        $this->assertEquals('  hsqq qww  ', decode('2 hs2q q2w2 '));
    }

    public function testEncodeDecodeCombination() : void
    {
        $this->assertEquals('zzz ZZ  zZ', decode(encode('zzz ZZ  zZ')));
    }
}
