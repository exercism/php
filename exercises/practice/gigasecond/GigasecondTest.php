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

    #[DataProvider('inputAndExpectedDates')]
    public function testFrom(string $inputDate, string $expected): void
    {
        $UTC = new DateTimeZone('UTC');
        $input = new DateTimeImmutable($inputDate, $UTC);

        $actual = from($input);

        $this->assertInstanceOf(DateTimeImmutable::class, $actual);
        $this->assertSame($expected, $actual->format('Y-m-d H:i:s'));
    }
}
