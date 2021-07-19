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

class DartsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Darts.php';
    }

    public function testMissedTarget(): void
    {
        $board = new Darts(-9, 9);
        $this->assertEquals(0, $board->score);
    }

    public function testInOuterCircle(): void
    {
        $board = new Darts(0, 10);
        $this->assertEquals(1, $board->score);
    }

    public function testInMiddleCircle(): void
    {
        $board = new Darts(-5, 0);
        $this->assertEquals(5, $board->score);
    }

    public function testInInnerCircle(): void
    {
        $board = new Darts(0, -1);
        $this->assertEquals(10, $board->score);
    }

    public function testInCenter(): void
    {
        $board = new Darts(0, 0);
        $this->assertEquals(10, $board->score);
    }

    public function testNearCenter(): void
    {
        $board = new Darts(-0.1, -0.1);
        $this->assertEquals(10, $board->score);
    }

    public function testJustInsideCenter(): void
    {
        $board = new Darts(0.7, 0.7);
        $this->assertEquals(10, $board->score);
    }

    public function testJustOutsideCenter(): void
    {
        $board = new Darts(0.8, -0.8);
        $this->assertEquals(5, $board->score);
    }

    public function testJustWithinMiddleCircle(): void
    {
        $board = new Darts(-3.5, 3.5);
        $this->assertEquals(5, $board->score);
    }

    public function testJustOutsideMiddleCircle(): void
    {
        $board = new Darts(-3.6, -3.6);
        $this->assertEquals(1, $board->score);
    }

    public function testJustInsideOuterCircle(): void
    {
        $board = new Darts(-7.0, 7.0);
        $this->assertEquals(1, $board->score);
    }

    public function testJustOutsideOuterCircle(): void
    {
        $board = new Darts(7.1, -7.1);
        $this->assertEquals(0, $board->score);
    }

    public function testAsymmetricPositionBetweenInnerAndOuterCircles(): void
    {
        $board = new Darts(0.5, -4);
        $this->assertEquals(5, $board->score);
    }
}
