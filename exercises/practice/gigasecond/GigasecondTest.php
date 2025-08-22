<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class GigasecondTest extends TestCase
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
     * @param string $inputDate
     * @param string $expected
     */
    #[DataProvider('inputAndExpectedDates')]
    public function testFrom(string $inputDate, string $expected): void
    {
        $date = $this->dateSetup($inputDate);
        $gs = from($date);

        $this->assertSame($expected, $gs->format('Y-m-d H:i:s'));
    }

    /**
     * @param string $inputDate
     */
    #[DataProvider('inputDates')]
    public function testFromReturnType(string $inputDate): void
    {
        $date = $this->dateSetup($inputDate);
        $this->assertInstanceOf(DateTimeImmutable::class, from($date));
    }
}
