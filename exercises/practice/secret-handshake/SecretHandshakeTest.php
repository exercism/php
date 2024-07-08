<?php

declare(strict_types=1);

class SecretHandshakeTest extends PHPUnit\Framework\TestCase
{
    private SecretHandshake $secretHandshake;

    public static function setUpBeforeClass(): void
    {
        require_once 'SecretHandshake.php';
    }

    public function setUp(): void
    {
        $this->secretHandshake = new SecretHandshake();
    }

    /**
     * @testdox Wink for 1
     * uuid: b8496fbd-6778-468c-8054-648d03c4bb23
     */
    public function testWinkForOne(): void
    {
        $this->assertEquals(['wink'], $this->secretHandshake->commands(1));
    }

    /**
     * @testdox Double blink for 10
     * uuid: 83ec6c58-81a9-4fd1-bfaf-0160514fc0e3
     */
    public function testDoubleBlinkForTen(): void
    {
        $this->assertEquals(['double blink'], $this->secretHandshake->commands(0b0_0010));
    }

    /**
     * @testdox close your eyes for 100
     * uuid: 0e20e466-3519-4134-8082-5639d85fef71
     */
    public function testCloseYourEyesForHundred(): void
    {
        $this->assertEquals(['close your eyes'], $this->secretHandshake->commands(0b100));
    }

    /**
     * @testdox jump for 1000
     * uuid: b339ddbb-88b7-4b7d-9b19-4134030d9ac0
     */
    public function testJumpForThousand(): void
    {
        $this->assertEquals(['jump'], $this->secretHandshake->commands(8));
    }

    /**
     * @testdox combine two actions
     * uuid: 40499fb4-e60c-43d7-8b98-0de3ca44e0eb
     */
    public function testCombineTwoActions(): void
    {
        $this->assertEquals(['wink', 'double blink'], $this->secretHandshake->commands(3));
    }

    /**
     * @testdox reverse two actions
     * uuid: 9730cdd5-ef27-494b-afd3-5c91ad6c3d9d
     */
    public function testReverseTwoActions(): void
    {
        $this->assertEquals(['double blink', 'wink'], $this->secretHandshake->commands(0b10011));
    }

    /**
     * @testdox reversing one action gives the same action
     * uuid: 0b828205-51ca-45cd-90d5-f2506013f25f
     */
    public function testReversingOneActionGivesTheSameAction(): void
    {
        $this->assertEquals(['jump'], $this->secretHandshake->commands(24));
    }

    /**
     * @testdox reversing no actions still gives no actions
     * uuid: 9949e2ac-6c9c-4330-b685-2089ab28b05f
     */
    public function testReversingNoActionsStillGivesNoActions(): void
    {
        $this->assertEquals([], $this->secretHandshake->commands(16));
    }

    /**
     * @testdox all possible actions
     * uuid: 23fdca98-676b-4848-970d-cfed7be39f81
     */
    public function testAllPossibleActions(): void
    {
        $this->assertEquals(
            ['wink', 'double blink', 'close your eyes', 'jump'],
            $this->secretHandshake->commands(15)
        );
    }

    /**
     * @testdox reverse all possible actions
     * uuid: ae8fe006-d910-4d6f-be00-54b7c3799e79
     */
    public function testReverseAllPossibleActions(): void
    {
        $this->assertEquals(
            ['jump', 'close your eyes', 'double blink', 'wink'],
            $this->secretHandshake->commands(31)
        );
    }

    /**
     * @testdox do nothing for zero
     * uuid: 3d36da37-b31f-4cdb-a396-d93a2ee1c4a5
     */
    public function testDoNothingForZero(): void
    {
        $this->assertEquals([], $this->secretHandshake->commands(0b0));
    }
}
