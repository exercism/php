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

class GigasecondTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Gigasecond.php';
    }

    public function dateSetup($date): DateTimeImmutable
    {
        $UTC = new DateTimeZone('UTC');
        return new DateTimeImmutable($date, $UTC);
    }

    public static function inputAndExpectedDates(): array
    {
        return [
            ['2011-04-25', '2043-01-01 01:46:40'],
            ['1977-06-13', '2009-02-19 01:46:40'],
            ['1959-07-19', '1991-03-27 01:46:40'],
            ['2015-01-24 22:00:00', '2046-10-02 23:46:40'],
            ['2015-01-24 23:59:59', '2046-10-03 01:46:39'],
        ];
    }

    public static function inputDates(): array
    {
        return [
            ['2011-04-25'],
            ['1977-06-13'],
            ['1959-07-19'],
            ['2015-01-24 22:00:00'],
            ['2015-01-24 23:59:59'],
        ];
    }

    /**
     * @dataProvider inputAndExpectedDates
     * @param string $inputDate
     * @param string $expected
     */
    public function testFrom(string $inputDate, string $expected): void
    {
        $date = $this->dateSetup($inputDate);
        $gs = from($date);

        $this->assertSame($expected, $gs->format('Y-m-d H:i:s'));
    }

    /**
     * @dataProvider inputDates
     * @param string $inputDate
     */
    public function testFromReturnType(string $inputDate): void
    {
        $date = $this->dateSetup($inputDate);
        $this->assertInstanceOf(DateTimeImmutable::class, from($date));
    }
}
