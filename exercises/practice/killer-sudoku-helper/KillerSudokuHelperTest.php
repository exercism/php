<?php

declare(strict_types=1);

class KillerSudokuHelperTest extends PHPUnit\Framework\TestCase
{
    private KillerSudokuHelper $killerSudokuHelper;

    public static function setUpBeforeClass(): void
    {
        require_once 'KillerSudokuHelper.php';
    }

    protected function setUp(): void
    {
        $this->killerSudokuHelper = new KillerSudokuHelper();
    }

    /**
     * uuid: 2aaa8f13-11b5-4054-b95c-a906e4d79fb6
     */
    public function testTrivialOneDigitCages1(): void
    {
        $expected = [
            [1]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(1, 1, []));
    }

    /**
     * uuid: 4645da19-9fdd-4087-a910-a6ed66823563
     */
    public function testTrivialOneDigitCages2(): void
    {
        $expected = [
            [2]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(2, 1, []));
    }

    /**
     * uuid: 07cfc704-f8aa-41b2-8f9a-cbefb674cb48
     */
    public function testTrivialOneDigitCages3(): void
    {
        $expected = [
            [3]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(3, 1, []));
    }

    /**
     * uuid: 22b8b2ba-c4fd-40b3-b1bf-40aa5e7b5f24
     */
    public function testTrivialOneDigitCages4(): void
    {
        $expected = [
            [4]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(4, 1, []));
    }

    /**
     * uuid: b75d16e2-ff9b-464d-8578-71f73094cea7
     */
    public function testTrivialOneDigitCages5(): void
    {
        $expected = [
            [5]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(5, 1, []));
    }

    /**
     * uuid: bcbf5afc-4c89-4ff6-9357-07ab4d42788f
     */
    public function testTrivialOneDigitCages6(): void
    {
        $expected = [
            [6]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(6, 1, []));
    }

    /**
     * uuid: 511b3bf8-186f-4e35-844f-c804d86f4a7a
     */
    public function testTrivialOneDigitCages7(): void
    {
        $expected = [
            [7]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(7, 1, []));
    }

    /**
     * uuid: bd09a60d-3aca-43bd-b6aa-6ccad01bedda
     */
    public function testTrivialOneDigitCages8(): void
    {
        $expected = [
            [8]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(8, 1, []));
    }

    /**
     * uuid: 9b539f27-44ea-4ff8-bd3d-c7e136bee677
     */
    public function testTrivialOneDigitCages9(): void
    {
        $expected = [
            [9]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(9, 1, []));
    }

    /**
     * uuid: 0a8b2078-b3a4-4dbd-be0d-b180f503d5c3
     */
    public function testCageWithSum45ContainsAllDigits1To9(): void
    {
        $expected = [
            [1, 2, 3, 4, 5, 6, 7, 8, 9]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(45, 9, []));
    }

    /**
     * uuid: 2635d7c9-c716-4da1-84f1-c96e03900142
     */
    public function testCageWithOnlyOnePossibleCombination(): void
    {
        $expected = [
            [1, 2, 4]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(7, 3, []));
    }

    /**
     * uuid: a5bde743-e3a2-4a0c-8aac-e64fceea4228
     */
    public function testCageWithSeveralCombinations(): void
    {
        $expected = [
            [1, 9], [2, 8], [3, 7], [4, 6]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(10, 2, []));
    }

    /**
     * uuid: dfbf411c-737d-465a-a873-ca556360c274
     */
    public function testCageWithSeveralCombinationsThatIsRestricted(): void
    {
        $expected = [
            [2, 8], [3, 7]
        ];
        $this->assertEquals($expected, $this->killerSudokuHelper->combinations(10, 2, [1, 4]));
    }
}
