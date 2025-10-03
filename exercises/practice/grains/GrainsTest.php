<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class GrainsTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Grains.php';
    }

    /**
     * PHP integers greater than 2^31 (32-bit systems)
     * or 2^63 (64-bit) are casted to floats.
     * In some cases it may lead to problems
     * https://php.net/manual/ru/language.types.float.php#warn.float-precision
     *
     * Consider King hates floats and demands solution with
     * precise integer-only calculations. Don't involve any floats.
     * Don't use gmp or any other similar libraries.
     * Try to make the solution for virtually any board size.
     */

    /**
     * uuid: 9fbde8de-36b2-49de-baf2-cd42d6f28405
     */
    #[TestDox('grains on square 1')]
    public function testGrainsOnSquare1(): void
    {
        $this->assertSame(1, square(1));
    }

    /**
     * uuid: ee1f30c2-01d8-4298-b25d-c677331b5e6d
     */
    #[TestDox('grains on square 2')]
    public function testGrainsOnSquare2(): void
    {
        $this->assertSame(2, square(2));
    }

     /**
     * uuid: 10f45584-2fc3-4875-8ec6-666065d1163b
     */
    #[TestDox('grains on square 3')]
    public function testGrainsOnSquare3(): void
    {
        $this->assertSame(4, square(3));
    }

    /**
     * uuid: a7cbe01b-36f4-4601-b053-c5f6ae055170
     */
    #[TestDox('grains on square 4')]
    public function testGrainsOnSquare4(): void
    {
        $this->assertSame(8, square(4));
    }

    /**
     * uuid: c50acc89-8535-44e4-918f-b848ad2817d4
     */
    #[TestDox('grains on square 16')]
    public function testGrainsOnSquare16(): void
    {
        $this->assertSame(32768, square(16));
    }

    /**
     * uuid: acd81b46-c2ad-4951-b848-80d15ed5a04f
     */
    #[TestDox('grains on square 32')]
    public function testGrainsOnSquare32(): void
    {
        $this->assertSame(2147483648, square(32));
    }

    /**
     * uuid: c73b470a-5efb-4d53-9ac6-c5f6487f227b
     */
    #[TestDox('grains on square 64')]
    public function testGrainsOnSquare64(): void
    {
        $this->assertSame(9223372036854775808, square(64));
    }

    /**
     * uuid: 1d47d832-3e85-4974-9466-5bd35af484e3
     */
    #[TestDox('square 0 is invalid')]
    public function testSquare0IsInvalid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('square must be between 1 and 64');

        square(0);
    }

     /**
     * uuid: 61974483-eeb2-465e-be54-ca5dde366453
     */
    #[TestDox('negative square is invalid')]
    public function testRejectsNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('square must be between 1 and 64');

        square(-1);
    }

     /**
     * uuid: a95e4374-f32c-45a7-a10d-ffec475c012f
     */
    #[TestDox('square greater than 64 is invalid')]
    public function testRejectsGreaterThan64(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('square must be between 1 and 64');

        square(65);
    }

    /**
     * uuid: 6eb07385-3659-4b45-a6be-9dc474222750
     */
    #[TestDox('returns the total number of grains on the board')]
    public function testTotal(): void
    {
        $this->assertSame(18446744073709551615, total());
    }
}
