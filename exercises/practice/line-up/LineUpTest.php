<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

final class LineUpTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once('LineUp.php');
    }

    /** uuid: 7760d1b8-4864-4db4-953b-0fa7c047dbc0 */
     #[TestDox('Format smallest non-exceptional ordinal numeral 4')]
    public function testFormatSmallestNonExceptionalOrdinalNumeral4(): void
    {
        $this->assertSame(
            'Gianna, you are the 4th customer we serve today. Thank you!',
            format('Gianna', 4)
        );
    }

    /** uuid: e8b7c715-6baa-4f7b-8fb3-2fa48044ab7a */
     #[TestDox('Format greatest single digit non-exceptional ordinal numeral 9')]
    public function testFormatGreatestSingleDigitNonExceptionalOrdinalNumeral9(): void
    {
        $this->assertSame(
            'Maarten, you are the 9th customer we serve today. Thank you!',
            format('Maarten', 9)
        );
    }

    /** uuid: f370aae9-7ae7-4247-90ce-e8ff8c6934df */
     #[TestDox('Format non-exceptional ordinal numeral 5')]
    public function testFormatNonExceptionalOrdinalNumeral5(): void
    {
        $this->assertSame(
            'Petronila, you are the 5th customer we serve today. Thank you!',
            format('Petronila', 5)
        );
    }

    /** uuid: 37f10dea-42a2-49de-bb92-0b690b677908 */
     #[TestDox('Format non-exceptional ordinal numeral 6')]
    public function testFormatNonExceptionalOrdinalNumeral6(): void
    {
        $this->assertSame(
            'Attakullakulla, you are the 6th customer we serve today. Thank you!',
            format('Attakullakulla', 6)
        );
    }

    /** uuid: d8dfb9a2-3a1f-4fee-9dae-01af3600054e */
     #[TestDox('Format non-exceptional ordinal numeral 7')]
    public function testFormatNonExceptionalOrdinalNumeral7(): void
    {
        $this->assertSame(
            'Kate, you are the 7th customer we serve today. Thank you!',
            format('Kate', 7)
        );
    }

    /** uuid: 505ec372-1803-42b1-9377-6934890fd055 */
     #[TestDox('Format non-exceptional ordinal numeral 8')]
    public function testFormatNonExceptionalOrdinalNumeral8(): void
    {
        $this->assertSame(
            'Maximiliano, you are the 8th customer we serve today. Thank you!',
            format('Maximiliano', 8)
        );
    }

    /** uuid: 8267072d-be1f-4f70-b34a-76b7557a47b9 */
     #[TestDox('Format exceptional ordinal numeral 1')]
    public function testFormatExceptionalOrdinalNumeral1(): void
    {
        $this->assertSame(
            'Mary, you are the 1st customer we serve today. Thank you!',
            format('Mary', 1)
        );
    }

    /** uuid: 4d8753cb-0364-4b29-84b8-4374a4fa2e3f */
     #[TestDox('Format exceptional ordinal numeral 2')]
    public function testFormatExceptionalOrdinalNumeral2(): void
    {
        $this->assertSame(
            'Haruto, you are the 2nd customer we serve today. Thank you!',
            format('Haruto', 2)
        );
    }

    /** uuid: 8d44c223-3a7e-4f48-a0ca-78e67bf98aa7 */
     #[TestDox('Format exceptional ordinal numeral 3')]
    public function testFormatExceptionalOrdinalNumeral3(): void
    {
        $this->assertSame(
            'Henriette, you are the 3rd customer we serve today. Thank you!',
            format('Henriette', 3)
        );
    }

    /** uuid: 6c4f6c88-b306-4f40-bc78-97cdd583c21a */
     #[TestDox('Format smallest two digit non-exceptional ordinal numeral 10')]
    public function testFormatSmallestTwoDigitNonExceptionalOrdinalNumeral10(): void
    {
        $this->assertSame(
            'Alvarez, you are the 10th customer we serve today. Thank you!',
            format('Alvarez', 10)
        );
    }

    /** uuid: e257a43f-d2b1-457a-97df-25f0923fc62a */
     #[TestDox('Format non-exceptional ordinal numeral 11')]
    public function testFormatNonExceptionalOrdinalNumeral11(): void
    {
        $this->assertSame(
            'Jacqueline, you are the 11th customer we serve today. Thank you!',
            format('Jacqueline', 11)
        );
    }

    /** uuid: bb1db695-4d64-457f-81b8-4f5a2107e3f4 */
     #[TestDox('Format non-exceptional ordinal numeral 12')]
    public function testFormatNonExceptionalOrdinalNumeral12(): void
    {
        $this->assertSame(
            'Juan, you are the 12th customer we serve today. Thank you!',
            format('Juan', 12)
        );
    }

    /** uuid: 60a3187c-9403-4835-97de-4f10ebfd63e2 */
     #[TestDox('Format non-exceptional ordinal numeral 13')]
    public function testFormatNonExceptionalOrdinalNumeral13(): void
    {
        $this->assertSame(
            'Patricia, you are the 13th customer we serve today. Thank you!',
            format('Patricia', 13)
        );
    }

    /** uuid: 2bdcebc5-c029-4874-b6cc-e9bec80d603a */
     #[TestDox('Format exceptional ordinal numeral 21')]
    public function testFormatExceptionalOrdinalNumeral21(): void
    {
        $this->assertSame(
            'Washi, you are the 21st customer we serve today. Thank you!',
            format('Washi', 21)
        );
    }

    /** uuid: 74ee2317-0295-49d2-baf0-d56bcefa14e3 */
     #[TestDox('Format exceptional ordinal numeral 62')]
    public function testFormatExceptionalOrdinalNumeral62(): void
    {
        $this->assertSame(
            'Nayra, you are the 62nd customer we serve today. Thank you!',
            format('Nayra', 62)
        );
    }

    /** uuid: b37c332d-7f68-40e3-8503-e43cbd67a0c4 */
     #[TestDox('Format exceptional ordinal numeral 100')]
    public function testFormatExceptionalOrdinalNumeral100(): void
    {
        $this->assertSame(
            'John, you are the 100th customer we serve today. Thank you!',
            format('John', 100)
        );
    }

    /** uuid: 0375f250-ce92-4195-9555-00e28ccc4d99 */
     #[TestDox('Format exceptional ordinal numeral 101')]
    public function testFormatExceptionalOrdinalNumeral101(): void
    {
        $this->assertSame(
            'Zeinab, you are the 101st customer we serve today. Thank you!',
            format('Zeinab', 101)
        );
    }

    /** uuid: 0d8a4974-9a8a-45a4-aca7-a9fb473c9836 */
     #[TestDox('Format non-exceptional ordinal numeral 112')]
    public function testFormatNonExceptionalOrdinalNumeral112(): void
    {
        $this->assertSame(
            'Knud, you are the 112th customer we serve today. Thank you!',
            format('Knud', 112)
        );
    }

    /** uuid: 06b62efe-199e-4ce7-970d-4bf73945713f */
     #[TestDox('Format exceptional ordinal numeral 123')]
    public function testFormatExceptionalOrdinalNumeral123(): void
    {
        $this->assertSame(
            'Yma, you are the 123rd customer we serve today. Thank you!',
            format('Yma', 123)
        );
    }
}
