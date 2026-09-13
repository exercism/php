<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SaveTheCowTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SaveTheCow.php';
    }

    /**
     * uuid: 71d340f9-fc29-4826-872e-ad7d0b83dd98
     */
    #[TestDox('Initially 9 failures are allowed and no letters are guessed')]
    public function testInitiallyNineFailuresAreAllowedAndNoLettersAreGuessed(): void
    {
        $guesses = [];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Ongoing", $saveTheCow->state);
        $this->assertEquals("____", $saveTheCow->maskedWord);
        $this->assertEquals(9, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: 76759c24-8f1a-4fc8-9ffd-d6a1ff0cf03b
     */
    #[TestDox('After 10 failures the game is over')]
    public function testAfterTenFailuresTheGameIsOver(): void
    {
        $guesses = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j"];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Lose", $saveTheCow->state);
        $this->assertEquals("____", $saveTheCow->maskedWord);
        $this->assertEquals(0, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: d6f2e202-7857-46fb-b709-43a7f3f3b2de
     */
    #[TestDox('Losing with several correct guesses')]
    public function testLosingWithSeveralCorrectGuesses(): void
    {
        $guesses = ["t", "o", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j"];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Lose", $saveTheCow->state);
        $this->assertEquals("_oot", $saveTheCow->maskedWord);
        $this->assertEquals(0, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: 71bc0cda-2032-4637-80c8-fc8771124c08
     */
    #[TestDox('Feeding a correct letter removes underscores')]
    public function testFeedingACorrectLetterRemovesUnderscores(): void
    {
        $guesses = ["t"];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Ongoing", $saveTheCow->state);
        $this->assertEquals("___t", $saveTheCow->maskedWord);
        $this->assertEquals(9, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: 5b568a1c-867d-418f-97a8-7b6f8a7ca0a2
     */
    #[TestDox('Feeding a correct letter twice counts as a failure')]
    public function testFeedingACorrectLetterTwiceCountsAsAFailure(): void
    {
        $guesses = ["t", "t"];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Ongoing", $saveTheCow->state);
        $this->assertEquals("___t", $saveTheCow->maskedWord);
        $this->assertEquals(8, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: 3d40f15b-0271-4c5d-b1a4-3e1f66ff221f
     */
    #[TestDox('Guessing a repeated letter reveals all instances')]
    public function testGuessingARepeatedLetterRevealsAllInstances(): void
    {
        $guesses = ["t", "t", "o"];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Ongoing", $saveTheCow->state);
        $this->assertEquals("_oot", $saveTheCow->maskedWord);
        $this->assertEquals(8, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: 11a86435-e401-4250-a26e-3b0d8c4049ad
     */
    #[TestDox('Getting all the letters right makes for a win')]
    public function testGettingAllTheLettersRightMakesForAWin(): void
    {
        $guesses = ["t", "t", "o", "l"];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Win", $saveTheCow->state);
        $this->assertEquals("loot", $saveTheCow->maskedWord);
        $this->assertEquals(8, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: b3d81876-84ee-45bb-b531-baa1b05b4709
     */
    #[TestDox('Winning on the last guess is still a win')]
    public function testWinningOnTheLastGuessIsStillAWin(): void
    {
        $guesses = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "t", "o", "l"];
        $saveTheCow = new SaveTheCow("loot");
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }

        $this->assertEquals("Win", $saveTheCow->state);
        $this->assertEquals("loot", $saveTheCow->maskedWord);
        $this->assertEquals(0, $saveTheCow->remainingFailures);
    }

    /**
     * uuid: cf204398-5e9f-402f-8bff-42cb7cbbbda9
     */
    #[TestDox('Guessing after a lose is error')]
    public function testGuessingAfterALoseIsError(): void
    {
        $guesses = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k"];
        $saveTheCow = new SaveTheCow("loot");

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('cannot guess after the game is lost');
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }
    }

    /**
     * uuid: c2ec5b3d-4923-4a0e-a485-6aa6e78c7ece
     */
    #[TestDox('Guessing after a win is error')]
    public function testGuessingAfterAWinIsError(): void
    {
        $guesses = ["t", "o", "l", "l"];
        $saveTheCow = new SaveTheCow("loot");

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('cannot guess after the game is won');
        foreach ($guesses as $guess) {
            $saveTheCow->guess($guess);
        }
    }
}
