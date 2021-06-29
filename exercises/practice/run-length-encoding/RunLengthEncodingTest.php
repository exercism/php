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

class RunLengthEncodingTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RunLengthEncoding.php';
    }

    public function testEncodeEmptyString(): void
    {
        $this->assertEquals('', encode(''));
    }

    public function testEncodeSingleCharactersOnly(): void
    {
        $this->assertEquals('XYZ', encode('XYZ'));
    }

    public function testDecodeEmptyString(): void
    {
        $this->assertEquals('', decode(''));
    }

    public function testDecodeSingleCharactersOnly(): void
    {
        $this->assertEquals('XYZ', decode('XYZ'));
    }

    public function testEncodeSimple(): void
    {
        $this->assertEquals('2A3B4C', encode('AABBBCCCC'));
    }

    public function testDecodeSimple(): void
    {
        $this->assertEquals('AABBBCCCC', decode('2A3B4C'));
    }

    public function testEncodeWithSingleValues(): void
    {
        $this->assertEquals(
            '12WB12W3B24WB',
            encode('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB')
        );
    }

    public function testDecodeWithSingleValues(): void
    {
        $this->assertEquals(
            'WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB',
            decode('12WB12W3B24WB')
        );
    }

    public function testDecodeMultipleWhitespaceMixedInString(): void
    {
        $this->assertEquals('  hsqq qww  ', decode('2 hs2q q2w2 '));
    }

    public function testEncodeDecodeCombination(): void
    {
        $this->assertEquals('zzz ZZ  zZ', decode(encode('zzz ZZ  zZ')));
    }
}
