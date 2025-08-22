<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;

/**
 * ATTENTION: We use a `from()` function for backwards compatibility, not `add()`
 */
class GigasecondTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Gigasecond.php';
    }

    public static function inputAndExpectedDates(): array
    {
        return [
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

    /** uuid: 92fbe71c-ea52-4fac-bd77-be38023cacf7 */
    #[TestDox('Date only specification of time')]
    public function testDateOnlySpecificationOfTime(): void
    {
        $UTC = new DateTimeZone('UTC');
        $input = new DateTimeImmutable('2011-04-25', $UTC);

        $actual = from($input);

        $this->assertInstanceOf(DateTimeImmutable::class, $actual);
        $this->assertSame(
            '2043-01-01 01:46:40',
            $actual->format('Y-m-d H:i:s'),
        );
    }

    /** uuid: 6d86dd16-6f7a-47be-9e58-bb9fb2ae1433 */
    #[TestDox('Second test for date only specification of time')]
    public function testSecondTestForDateOnlySpecificationOfTime(): void
    {
        $UTC = new DateTimeZone('UTC');
        $input = new DateTimeImmutable('1977-06-13', $UTC);

        $actual = from($input);

        $this->assertInstanceOf(DateTimeImmutable::class, $actual);
        $this->assertSame(
            '2009-02-19 01:46:40',
            $actual->format('Y-m-d H:i:s'),
        );
    }

    /** uuid: 77eb8502-2bca-4d92-89d9-7b39ace28dd5 */
    #[TestDox('Third test for date only specification of time')]
    public function testThirdTestForDateOnlySpecificationOfTime(): void
    {
        $UTC = new DateTimeZone('UTC');
        $input = new DateTimeImmutable('1959-07-19', $UTC);

        $actual = from($input);

        $this->assertInstanceOf(DateTimeImmutable::class, $actual);
        $this->assertSame(
            '1991-03-27 01:46:40',
            $actual->format('Y-m-d H:i:s'),
        );
    }

    /** uuid: c9d89a7d-06f8-4e28-a305-64f1b2abc693 */
    #[TestDox('Full time specified')]
    public function testFullTimeSpecified(): void
    {
        $UTC = new DateTimeZone('UTC');
        $input = new DateTimeImmutable('2015-01-24 22:00:00', $UTC);

        $actual = from($input);

        $this->assertInstanceOf(DateTimeImmutable::class, $actual);
        $this->assertSame(
            '2046-10-02 23:46:40',
            $actual->format('Y-m-d H:i:s'),
        );
    }
}
