<?php

declare(strict_types=1);

class DartsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Darts.php';
    }

    /**
     * uuid 9033f731-0a3a-4d9c-b1c0-34a1c8362afb
     * @testdox Missed target
     */
    public function testMissedTarget(): void
    {
        $this->assertEquals(0, score(-9.0, 9.0));
    }

    /**
     * uuid 4c9f6ff4-c489-45fd-be8a-1fcb08b4d0ba
     * @testdox On the outer circle
     */
    public function testInOuterCircle(): void
    {
        $this->assertEquals(1, score(0.0, 10.0));
    }

    /**
     * uuid 14378687-ee58-4c9b-a323-b089d5274be8
     * @testdox On the middle circle
     */
    public function testInMiddleCircle(): void
    {
        $this->assertEquals(5, score(-5.0, 0.0));
    }

    /**
     * uuid 849e2e63-85bd-4fed-bc3b-781ae962e2c9
     * @testdox On the inner circle
     */
    public function testInInnerCircle(): void
    {
        $this->assertEquals(10, score(0.0, -1.0));
    }

    /**
     * uuid 1c5ffd9f-ea66-462f-9f06-a1303de5a226
     * @testdox Exactly on center
     */
    public function testInCenter(): void
    {
        $this->assertEquals(10, score(0.0, 0.0));
    }

    /**
     * uuid b65abce3-a679-4550-8115-4b74bda06088
     * @testdox Near the center
     */
    public function testNearCenter(): void
    {
        $this->assertEquals(10, score(-0.1, -0.1));
    }

    /**
     * uuid 66c29c1d-44f5-40cf-9927-e09a1305b399
     * @testdox Just within the inner circle
     */
    public function testJustInsideCenter(): void
    {
        $this->assertEquals(10, score(0.7, 0.7));
    }

    /**
     * uuid d1012f63-c97c-4394-b944-7beb3d0b141a
     * @testdox Just outside the inner circle
     */
    public function testJustOutsideCenter(): void
    {
        $this->assertEquals(5, score(0.8, -0.8));
    }

    /**
     * uuid ab2b5666-b0b4-49c3-9b27-205e790ed945
     * @testdox Just within the middle circle
     */
    public function testJustWithinMiddleCircle(): void
    {
        $this->assertEquals(5, score(-3.5, 3.5));
    }

    /**
     * uuid 70f1424e-d690-4860-8caf-9740a52c0161
     * @testdox Just outside the middle circle
     */
    public function testJustOutsideMiddleCircle(): void
    {
        $this->assertEquals(1, score(-3.6, -3.6));
    }

    /**
     * uuid a7dbf8db-419c-4712-8a7f-67602b69b293
     * @testdox Just within the outer circle
     */
    public function testJustInsideOuterCircle(): void
    {
        $this->assertEquals(1, score(-7.0, 7.0));
    }

    /**
     * uuid e0f39315-9f9a-4546-96e4-a9475b885aa7
     * @testdox Just outside the outer circle
     */
    public function testJustOutsideOuterCircle(): void
    {
        $this->assertEquals(0, score(7.1, -7.1));
    }

    /**
     * uuid 045d7d18-d863-4229-818e-b50828c75d19
     * @testdox Asymmetric position between the inner and middle circles
     */
    public function testAsymmetricPositionBetweenInnerAndOuterCircles(): void
    {
        $this->assertEquals(5, score(0.5, -4));
    }
}
