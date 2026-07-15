<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SecretHandshakeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SecretHandshake.php';
    }

    /**
     * uuid: b8496fbd-6778-468c-8054-648d03c4bb23
     */
    #[TestDox('Wink for 1')]
    public function testWinkForOne(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(['wink'], $secretHandshake->commands(1));
    }

    /**
     * uuid: 83ec6c58-81a9-4fd1-bfaf-0160514fc0e3
     */
    #[TestDox('Double blink for 10')]
    public function testDoubleBlinkForTen(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(['double blink'], $secretHandshake->commands(0b0_0010));
    }

    /**
     * uuid: 0e20e466-3519-4134-8082-5639d85fef71
     */
    #[TestDox('Close your eyes for 100')]
    public function testCloseYourEyesForHundred(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(['close your eyes'], $secretHandshake->commands(0b100));
    }

    /**
     * uuid: b339ddbb-88b7-4b7d-9b19-4134030d9ac0
     */
    #[TestDox('Jump for 1000')]
    public function testJumpForThousand(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(['jump'], $secretHandshake->commands(8));
    }

    /**
     * uuid: 40499fb4-e60c-43d7-8b98-0de3ca44e0eb
     */
    #[TestDox('Combine two actions')]
    public function testCombineTwoActions(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(['wink', 'double blink'], $secretHandshake->commands(3));
    }

    /**
     * uuid: 9730cdd5-ef27-494b-afd3-5c91ad6c3d9d
     */
    #[TestDox('Reverse two actions')]
    public function testReverseTwoActions(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(['double blink', 'wink'], $secretHandshake->commands(0b10011));
    }

    /**
     * uuid: 0b828205-51ca-45cd-90d5-f2506013f25f
     */
    #[TestDox('Reversing one action gives the same action')]
    public function testReversingOneActionGivesTheSameAction(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(['jump'], $secretHandshake->commands(24));
    }

    /**
     * uuid: 9949e2ac-6c9c-4330-b685-2089ab28b05f
     */
    #[TestDox('Reversing no actions still gives no actions')]
    public function testReversingNoActionsStillGivesNoActions(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals([], $secretHandshake->commands(16));
    }

    /**
     * uuid: 23fdca98-676b-4848-970d-cfed7be39f81
     */
    #[TestDox('All possible actions')]
    public function testAllPossibleActions(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(
            ['wink', 'double blink', 'close your eyes', 'jump'],
            $secretHandshake->commands(15)
        );
    }

    /**
     * uuid: ae8fe006-d910-4d6f-be00-54b7c3799e79
     */
    #[TestDox('Reverse all possible actions')]
    public function testReverseAllPossibleActions(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals(
            ['jump', 'close your eyes', 'double blink', 'wink'],
            $secretHandshake->commands(31)
        );
    }

    /**
     * uuid: 3d36da37-b31f-4cdb-a396-d93a2ee1c4a5
     */
    #[TestDox('Do nothing for zero')]
    public function testDoNothingForZero(): void
    {
        $secretHandshake = new SecretHandshake();
        $this->assertEquals([], $secretHandshake->commands(0b0));
    }
}
