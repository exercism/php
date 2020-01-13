<?php

class GigasecondTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'gigasecond.php';
    }

    public function dateSetup($date) : DateTimeImmutable
    {
        $UTC = new DateTimeZone('UTC');
        return new DateTimeImmutable($date, $UTC);
    }

    public function inputAndExpectedDates(): array
    {
        return [
            ['2011-04-25', '2043-01-01 01:46:40'],
            ['1977-06-13', '2009-02-19 01:46:40'],
            ['1959-07-19', '1991-03-27 01:46:40'],
            ['2015-01-24 22:00:00', '2046-10-02 23:46:40'],
            ['2015-01-24 23:59:59', '2046-10-03 01:46:39'],
        ];
    }

    public function inputDates(): array
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
