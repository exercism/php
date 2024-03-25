<?php

namespace App\Tests\TestGeneration;

trait AssertStringOrder
{
    private function assertStringContainsStringBeforeString(
        string $firstString,
        string $secondString,
        string $actualString,
        string $message = '',
    ):void {
        $this->assertStringContainsString($firstString, $actualString);
        $this->assertStringContainsString($secondString, $actualString);

        $firstPosition = \strpos($actualString, $firstString);
        $secondPosition = \strpos($actualString, $secondString);

        if ($firstPosition > $secondPosition) {
            $this->fail(
                empty($message)
                ? 'Failed asserting that "'
                    . $actualString
                    . '" contains "'
                    . $firstString
                    . '" before "'
                    . $secondString
                    . '"'
                : $message
            );
        }
        // Count the above conditional as assertion
        // Using this assertion directly results in misleading failure message
        $this->assertTrue(true);
    }
}
