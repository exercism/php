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

use PHPUnit\Framework\TestCase;

class SpiralMatrixTest extends TestCase
{
    private SpiralMatrix $spiralMatrix;

    public static function setUpBeforeClass(): void
    {
        require_once 'SpiralMatrix.php';
    }

    public function setUp(): void
    {
        $this->spiralMatrix = new SpiralMatrix();
    }

    /**
     * uuid: 8f584201-b446-4bc9-b132-811c8edd9040
     */
    public function testEmptySpiral(): void
    {
        $expected = [];
        $actual = $this->spiralMatrix->draw(0);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: e40ae5f3-e2c9-4639-8116-8a119d632ab2
     */
    public function testTrivialSpiral(): void
    {
        $expected = [[1]];
        $actual = $this->spiralMatrix->draw(1);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: cf05e42d-eb78-4098-a36e-cdaf0991bc48
     */
    public function testSpiralOfSize2(): void
    {
        $expected = [
            [1, 2],
            [4, 3],
        ];
        $actual = $this->spiralMatrix->draw(2);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 1c475667-c896-4c23-82e2-e033929de939
     */
    public function testSpiralOfSize3(): void
    {
        $expected = [
            [1, 2, 3],
            [8, 9, 4],
            [7, 6, 5],
        ];
        $actual = $this->spiralMatrix->draw(3);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 05ccbc48-d891-44f5-9137-f4ce462a759d
     */
    public function testSpiralOfSize4(): void
    {
        $expected = [
            [1, 2, 3, 4],
            [12, 13, 14, 5],
            [11, 16, 15, 6],
            [10, 9, 8, 7],
        ];
        $actual = $this->spiralMatrix->draw(4);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: f4d2165b-1738-4e0c-bed0-c459045ae50d
     */
    public function testSpiralOfSize5(): void
    {
        $expected = [
            [1, 2, 3, 4, 5],
            [16, 17, 18, 19, 6],
            [15, 24, 25, 20, 7],
            [14, 23, 22, 21, 8],
            [13, 12, 11, 10, 9],
        ];
        $actual = $this->spiralMatrix->draw(5);
        $this->assertEquals($expected, $actual);
    }
}
