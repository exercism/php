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

class BinaryTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Binary.php';
    }

    public function testItParsesBinary0ToDecimal0(): void
    {
        $this->assertEquals(0, parse_binary('0'));
    }

    public function testItParsesBinary1ToDecimal1(): void
    {
        $this->assertEquals(1, parse_binary('1'));
    }

    public function testItParsesDigits(): void
    {
        $this->assertEquals(2, parse_binary('10'));
        $this->assertEquals(3, parse_binary('11'));
        $this->assertEquals(4, parse_binary('100'));
        $this->assertEquals(9, parse_binary('1001'));
    }

    public function testItParsesHundreds(): void
    {
        $this->assertEquals(128, parse_binary('10000000'));
        $this->assertEquals(315, parse_binary('100111011'));
        $this->assertEquals(800, parse_binary('1100100000'));
        $this->assertEquals(999, parse_binary('1111100111'));
    }

    public function testItParsesMaxInt(): void
    {
        $this->assertEquals(
            9223372036854775807,
            parse_binary('111111111111111111111111111111111111111111111111111111111111111')
        );
    }

    public function testItParsesValuesWithLeadingZeros(): void
    {
        $this->assertEquals(1, parse_binary('01'));
        $this->assertEquals(2, parse_binary('0010'));
        $this->assertEquals(3, parse_binary('00011'));
    }

    /**
     * @dataProvider invalidValues
     */
    public function testItOnlyAcceptsStringsContainingZerosAndOnes($value): void
    {
        $this->expectException(InvalidArgumentException::class);

        parse_binary($value);
    }

    public function invalidValues(): array
    {
        return [
            ['2'], ['12345'], ['a'], ['0abcdef'],
        ];
    }
}
