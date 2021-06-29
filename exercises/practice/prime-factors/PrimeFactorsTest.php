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

class PrimeFactorsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PrimeFactors.php';
    }

    public function testNoFactors(): void
    {
        $this->assertSame([], factors(1));
    }

    public function testOneFactor(): void
    {
        $this->assertSame([2], factors(2));
    }

    public function testSquareOfPrime(): void
    {
        $this->assertSame([3, 3], factors(9));
    }

    public function testCubeOfPrime(): void
    {
        $this->assertSame([2, 2, 2], factors(8));
    }

    public function testProductOfPrimesAndNon(): void
    {
        $this->assertEquals([2, 2, 3], factors(12));
    }

    public function testProductOfPrimes(): void
    {
        $this->assertEquals([5, 17, 23, 461], factors(901255));
    }

    public function testFactorsIncludeLargePrime(): void
    {
        $this->assertEquals([11, 9539, 894119], factors(93819012551));
    }
}
